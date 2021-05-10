//"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --disable-web-security --disable-gpu --user-data-dir=%TEMP%/chromeTemp
function nazioni(){
	var d = document.getElementById("printhere");
	var list = "";
	//d.innerHTML = "ciao mondo";
	 $.ajax({
		   url: 'http://localhost/ProgettoEsame-main1.0/Progetto-esame/back-end/nazioni.php',
		   //'http://localhost:80/ProgettoEsame-main1.0/Progetto-esame/back-end/nazione.php',
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.nazioni, function (i, post) {
                     list += post.nome;
                });
				/*$.each(data.nazioni, function (i, post) {
					list += post.nome;
				});*/
				d.innerHTML = list;
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
	//http://localhost/ProgettoEsame-main1.0/Progetto-esame/back-end/nazioni.php
}

function GETrequest(){
	
}