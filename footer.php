<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=Your_Google_map_API_Key&libraries=places"></script>
  <script>
      google.maps.event.addDomListener(window, 'load', initialize);
      function initialize() {
      var input = document.getElementById('address');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
        document.getElementById("latitude").value = place.geometry['location'].lat();
        document.getElementById("longitude").value = place.geometry['location'].lng();
      });
      }
  </script>