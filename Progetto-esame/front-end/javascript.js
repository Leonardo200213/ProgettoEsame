
function inserisci(){
	var giorno = $('#input_4_date').val();
	var ora = $('#input_4_duration').val();
    var zona = $('#input_4_timezone').val();




	var lezione1 = $('input[name="tempera"]:checked').val();
	var lezione2 = $('input[name="acquarello"]:checked').val();
    var lezione3 = $('input[name="carboncino"]:checked').val();

    var credito = $('input[name="credito"]:checked').val();
    var paypal = $('input[name="paypal"]:checked').val();
    
	var prenotazione = {
		"giorno": giorno,
		"ora": ora,
		"zona": zona
    };
    function richiesta(prenotazione);

    var corso = {
        "lezione1": lezione1,
		"lezione2": lezione2,
		"lezione3": lezione3, 
        "credito": credito, 
        "paypal": paypal
    }
    function richiesta(corso);
    
}
    
    function richiesta(prenotazione){
$.ajax({
    url: 'http://localhost/ProgettoEsame/Progetto-esame/back-end/utente.php',
    method: 'POST',
    data: JSON.stringify(prenotazione),
    contenttype: 'json',
    success: function (data, result, textStatus, xhr) {
        //$("#printhere").html("stato: "+ xhr.status);
        location = "riuscito.html";
    },
    error: function (xhr, textStatus, errorThrown) {
        console.log(xhr.status);
    }
});
    
    }
    











/*
Google Maps API

function initMap() {
    var uluru = {
        lat: 43.84164642756516,
        lng: 10.504529848071767
    };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: uluru,
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
*/