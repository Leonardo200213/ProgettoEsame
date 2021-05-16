//"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --disable-web-security --disable-gpu --user-data-dir=%TEMP%/chromeTemp
//digitare la stringa sul prompt dei comandi
function nazioni(){
	var d = document.getElementById("printhere");

	 $.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/nazioni.php',
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.regioni, function (i, post) {
                     aggiungi(post.nome);
                });
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
}

function inserisci(){
	var d = document.getElementById("printhere");
	var cognome = $('#cognome').val();
	var nome = $('#nome').val();
	var genere = $('input[name="sesso"]:checked').val();
	var età = $('#anni').val();
	var indirizzo = $('#indirizzo').val();
	var cellulare = $('#telefono').val();
	var comune = $('#città').val();
	var cap = $('#cap').val();
	var nazione = $( "#country option:selected" ).text();
	var utente = {
		"cognome": cognome,
		"nome": nome,
		"sesso": genere,
		"età": età,
		"indirizzo": indirizzo,
		"telefono": cellulare,
		"comune": comune,
		"id_cap": cap, 
		"nazione": nazione
	};
	d.innerHTML = JSON.stringify(utente);
	$.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/utente.php/',
		   method: 'POST',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.utenti, function (i, post) {
                     //aggiungi(post.);
                });
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
}

function aggiungi(paese){
	var tag = document.createElement('option');
	tag.innerHTML = paese;
	document.getElementById('country').appendChild(tag);
}

function rollforward(){
	$("#first").css("display", "none");
	$("#second").css("display", "block");
}

function rollback(){
	$("#first").css("display", "block");
	$("#second").css("display", "none");
}

function GETrequest(){
	
}