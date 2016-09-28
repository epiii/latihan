<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="realChat.csso">
	</head>
	<body>
		<div id="chatws">
	<div class="tabs">Hello, <span id="ip">Anonim</span> <a target="_BLANK" href="http://ibacor.com/blog/tutorial-membuat-aplikasi-chatting-secara-realtime-menggunakan-firebase-jquery" style="padding-right:20px;float:right;color:#fff">Tutorial</a></div>
	<div class="chat">
		<div id='message_box'>
			<!-- Display messages -->
		</div>
		<form id="msg_form">
			<input id="message" type="text" placeholder="Pesan.." />
			<button type="submit" id="save" style="display:none">Send</button>
		</form>
	</div>
</div>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="//cdn.firebase.com/js/client/2.2.3/firebase.js"></script>
		<script type="text/javascript" src="realChat.js"></script>

	</body>
</html>