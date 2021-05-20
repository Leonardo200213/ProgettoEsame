//"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --disable-web-security --disable-gpu --user-data-dir=%TEMP%/chromeTemp
//digitare la stringa sul prompt dei comandi

function nazioni(){
	var d = document.getElementById("printhere");
	//primo_lista("regione", "regione");
	 $.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/nazioni.php',
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.regioni, function (i, post) {
                     aggiungi(post.id_regione, post.nome, "regione");
                });
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
}

function get_Select_Item(item){
	var d = document.getElementById("printhere");
	var reg = document.getElementById(item);
    var i = reg.options[reg.selectedIndex].value;
	return i;
}

function svuota_Select(item){
	var selectElement = document.getElementById(item);
	var i, L = selectElement.options.length - 1;
   for(i = L; i >= 0; i--) {
      selectElement.remove(i);
   }
}

function provincie(){
	 svuota_Select("provincia");
	 svuota_Select("comune");
	 var d = document.getElementById("printhere");
     var buffer = get_Select_Item("regione"); 
     var id = dividi(buffer);
	 primo_lista("provincia", "provincia");
	 
	 $.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/provincia.php/' + id,
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.provincie, function (i, post) {
                     aggiungi(post.id_provincia, post.nome, "provincia");
                });
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
    });
}

function comuni(){
	 svuota_Select("comune");
	 var buffer = get_Select_Item("provincia"); 
     var id = dividi(buffer);
	 $.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/comuni.php/'+id,
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.comuni, function (i, post) {
                     aggiungi(post.id_comune, post.nome, "comune");
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

function primo_lista(item, messagge){
	var tag = document.createElement('option');
	tag.innerHTML = "Selezionare "+messagge;
	document.getElementById(item).appendChild(tag);
}

function aggiungi(id, paese, item){
	var tag = document.createElement('option');
	tag.innerHTML = id+")  " + paese;
	document.getElementById(item).appendChild(tag);
}

function rollforward(){
	$("#first").css("display", "none");
	$("#second").css("display", "block");
}

function rollback(){
	$("#first").css("display", "block");
	$("#second").css("display", "none");
}

function dividi(buffer){
	var str = buffer;
	var res = str.split(")");
	return res[0];
}

function GETrequest(){
	
}