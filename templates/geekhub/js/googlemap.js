function initialize() {
    var latlng = new google.maps.LatLng(49.42608363349172,32.09461569786072);
    var myOptions = {
        zoom: 15,
        center: latlng,
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    var marker = new google.maps.Marker({
        position: latlng,
        title:"Дім Євангелія, вул. Горького 60"
    });

    var infowindow = new google.maps.InfoWindow({
        content: marker.title
    });
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });

    marker.setMap(map);
}
