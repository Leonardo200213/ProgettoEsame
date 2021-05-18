
$(document).ready(function(){
	$("#stampa").click(function(){
	var somma = '{"comuni":[{"codice":"cod","nome":"nominativi"}]}';
	var cod = "";
	var nominativi = "";
	var obj;
	//var d = document.getElementById("printhere");
	$.getJSON("comuni_ridotti.json", function(data){
		$(data).each(function(i, item){
		
		obj = JSON.parse(somma);
		obj['comuni'].push({"codice":item.codice,"nome":item.nome,
		    "codice_prov":item.provincia.codice,"nome_prov":item.provincia.nome,
			"codice_reg":item.regione.codice,"nome_reg":item.regione.nome});
		somma = JSON.stringify(obj);
		});
		//d.innerHTML = nominativi;
		//d.innerHTML = somma;
		insert(somma);
	});
	//insert(cod, nominativi);
	//d.innerHTML = somma;
	});
	
	/*function video(){
		$.ajax({
		   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/nazioni.php',
		   method: 'GET',
		   contenttype: 'json',
		   success: function (data, textStatus, jQxhr) {
			   $.each(data.nazioni, function (i, post) {
                     aggiungi(post.nome);
                });
		   },
		   error: function (jQxhr, textStatus, errorThrown) {
			   console.log(errorThrown);
		   }
		});
	}*/
	
	function insert(metadato){
		var d = document.getElementById("printhere");
		var buffer = "";
		$.ajax({
			   url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/nazioni.php',
			   method: 'POST',
			   data: JSON.stringify(metadato),
			   contenttype: 'json',
			   success: function (data, textStatus, jQxhr) {
				   //buffer = JSON.stringify(data.regioni);
				   /*$.each(data.regioni, function (i, post) {
                     buffer += data.regioni;
					 });*/
					 d.innerHTML = JSON.stringify(data);
			   },
			   error: function (jQxhr, textStatus, errorThrown) {
				   console.log(errorThrown);
			   }
		});
	}
});