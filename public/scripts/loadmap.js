
var coordinates = new google.maps.LatLng(34.10130184593345, -118.34367823558209);
var mapOptions = {
    center : coordinates,
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}

function initialize() { 
    var map = new google.maps.Map(
        document.getElementById('map'),
        mapOptions
    );

    var marker = new google.maps.Marker({
        position: coordinates,
        map: map
    });
}
window.addEventListener('load', initialize);
