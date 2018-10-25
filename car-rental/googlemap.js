function initMap() {
  var auckland = {lat: -36.845436, lng: 174.763118};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: auckland
  });

  var video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/cwQgjq0mCdE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

  var infowindow = new google.maps.InfoWindow({
    content: video
  });

  var marker = new google.maps.Marker({
    position: auckland,
    map: map,
    title: '20 Hobson st, Auckland'
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
}

