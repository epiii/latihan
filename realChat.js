//create firebase reference
var dbRef    = new Firebase("https://ibacor.firebaseio.com/");
var chatsRef = dbRef.child('chats');

var newItems = false;

//load older conatcts as well as any newly added one...
chatsRef.on("child_added", function(snap) {
    console.log("added", snap.key(), snap.val());
    document.querySelector('#message_box').innerHTML += (chatHtmlFromObject(snap.val()));
	if (!newItems) return;	
	//automatic scroll to bottom
    $("html, body").animate({
        scrollTop: $(document).height()
    }, 1000);
});

chatsRef.once('value', function(snap) {
  newItems = true;
});

//save chat
document.querySelector('#save').addEventListener("click", function(event) {
    var a = new Date(),
        b = a.getDate(),
        c = a.getMonth(),
        d = a.getFullYear(),
        date = b + '/' + c + '/' + d,
		chatForm = document.querySelector('#msg_form');
    event.preventDefault();
    if (document.querySelector('#message').value != '') {
        chatsRef
            .push({
                name: document.querySelector('#ip').innerHTML,
                message: document.querySelector('#message').value,
                date: date
            })
        chatForm.reset();
    } else {
        alert('Please fill atlease message!');
    }
}, false);

//prepare conatct object's HTML
function chatHtmlFromObject(chat) {
    console.log(chat);
	var bubble = (chat.name == document.querySelector('#ip').innerHTML ? "bubble-right" : "bubble-left");
    var html = '<div class="' + bubble + '"><p><span class="name">' + chat.name + '</span><span class="msgc">' + htmlEntities(chat.message) + '</span><span class="date">' + chat.date + '</span></p></div>';
    return html;
}

//message htmlEntities encode
function htmlEntities(a) {
    return String(a).replace(/</g, '<').replace(/>/g, '>')
}	

//get user ipaddress
function getIPs(callback) {
    var ip_dups = {};

    //compatibility for firefox and chrome
    var RTCPeerConnection = window.RTCPeerConnection ||
        window.mozRTCPeerConnection ||
        window.webkitRTCPeerConnection;
    var useWebKit = !!window.webkitRTCPeerConnection;

    //bypass naive webrtc blocking using an iframe
    if (!RTCPeerConnection) {
        var win = iframe.contentWindow;
        RTCPeerConnection = win.RTCPeerConnection ||
            win.mozRTCPeerConnection ||
            win.webkitRTCPeerConnection;
        useWebKit = !!win.webkitRTCPeerConnection;
    }

    //minimal requirements for data connection
    var mediaConstraints = {
        optional: [{
            RtpDataChannels: true
        }]
    };

    var servers = {
        iceServers: [{
            urls: "stun:stun.services.mozilla.com"
        }]
    };

    //construct a new RTCPeerConnection
    var pc = new RTCPeerConnection(servers, mediaConstraints);

    function handleCandidate(candidate) {
        //match just the IP address
        var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
        var ip_addr = ip_regex.exec(candidate)[1];

        //remove duplicates
        if (ip_dups[ip_addr] === undefined)
            callback(ip_addr);

        ip_dups[ip_addr] = true;
    }

    //listen for candidate events
    pc.onicecandidate = function(ice) {

        //skip non-candidate events
        if (ice.candidate)
            handleCandidate(ice.candidate.candidate);
    };

    //create a bogus data channel
    pc.createDataChannel("");

    //create an offer sdp
    pc.createOffer(function(result) {

        //trigger the stun server request
        pc.setLocalDescription(result, function() {}, function() {});

    }, function() {});

    //wait for a while to let everything done
    setTimeout(function() {
        //read candidate info from local description
        var lines = pc.localDescription.sdp.split('\n');

        lines.forEach(function(line) {
            if (line.indexOf('a=candidate:') === 0)
                handleCandidate(line);
        });
    }, 1000);
}

//insert IP addresses into the page
getIPs(function(ip) {
    if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/))
        document.querySelector('#ip').innerHTML = ip;
});