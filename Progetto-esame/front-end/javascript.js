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