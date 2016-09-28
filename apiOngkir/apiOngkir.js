$(document).ready(function(){
  	$("#cek").click(function(){
		var service = $("#service").val(),
		dari        = $("#dari").val(),
		ke          = $("#ke").val(),
		berat       = $("#berat").val(),
		k           = 'df03e440e5c91359c0c597c5e0aeeeea'; 
        // api key ini hanya bisa d gunakan oleh situs 
        // http://codepen.io jika menggunakan ajx. 
        // Untuk mendapatkan api key untuk situs sobat bisa mendapatkan.y 
        // di http://ibacor.com/api 100% free
		ongkir(service,dari,ke,berat,k);
	  });
	});

	function ongkir(service,dari,ke,berat,k) {
		$.ajax({
			url: 'http://ibacor.com/api/ongkir?service='+service+'&dari='+dari+'&ke='+ke+'&berat='+berat+'&k=' + k,
			crossDomain: true,
			dataType: 'json'
		}).done(function (data) {
			var html = '';
			if(data.status == 'success'){
          html += '<p>ongkir: ' + data.service + '<br>';
          html += 'dari: ' + data.dari + '<br>';
          html += 'ke: ' + data.ke + '<br>';
          html += 'berat: ' + data.berat + '</p><hr>';
				$.each(data.ongkos, function(i, item) {
          html += '<p>';
					$.each(data.ongkos[i], function(index, value) {
					html += index+': '+value+'<br>';
         }); 
           html += '</p>';
         }); 
			}else{
				html += data.status+': '+data.message;
			}
			$('.ongkir').html(html);
		});
	}