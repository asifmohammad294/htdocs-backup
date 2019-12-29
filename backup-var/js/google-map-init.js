var locations = [
      ['Head Office', 41.38376393456, 2.1725484608154297, ],
    ];

var map = new google.maps.Map(document.getElementById('map'), {
    scrollwheel: false,
    styles: [{"featureType":"administrative.neighborhood","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"hue":"#ffa900"}]}],
        center: new google.maps.LatLng(41.38376393456,  2.1725484608154297)
    });

var infowindow = new google.maps.InfoWindow();
var marker, i;
var markers = new Array();
for (i = 0; i < locations.length; i++) {  
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map,
    icon: locations[i][3]
  });
  markers.push(marker);
  google.maps.event.addListener(marker, 'click', (function(marker, i) {
    return function() {
      infowindow.setContent(locations[i][0]);
      infowindow.open(map, marker);
    }
  })(marker, i));
}

function AutoCenter() {
  var bounds = new google.maps.LatLngBounds();
  $.each(markers, function (index, marker) {
  bounds.extend(marker.position);
  });
  map.fitBounds(bounds);
  var listener = google.maps.event.addListener(map, "idle", function() { 
  if (map.getZoom() > 6) map.setZoom(13); 
      google.maps.event.removeListener(listener); 
});
}
AutoCenter();