//"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --disable-web-security --disable-gpu --user-data-dir=%TEMP%/chromeTemp
//digitare la stringa sul prompt dei comandi
function nazioni(){
	var d = document.getElementById("printhere");
	var list = "";

	 $.ajax({
		   url: 'http://localhost/ProgettoEsame-main1.0/Progetto-esame/back-end/nazioni.php',
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.nazioni, function (i, post) {
                     list += post.nome;
                });
				
				d.innerHTML = list;
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
}

function GETrequest(){
	
}