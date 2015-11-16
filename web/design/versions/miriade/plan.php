<?php include('header.inc'); ?>

    <div class="container">

      <div class="row">
        <div class="col-md-9">


          <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
          <script>  
 
            function init_map() {
            var var_location = new google.maps.LatLng(49.1871015,-0.3131677);
         
                var var_mapoptions = {
                  center: var_location,
                  zoom: 14
                };
         
            var var_marker = new google.maps.Marker({
              position: var_location,
                    map: var_map,
              title:"Venice"});
         
                var var_map = new google.maps.Map(document.getElementById("map-container"),
                    var_mapoptions);
         
            var_marker.setMap(var_map); 
         
              }
         
              google.maps.event.addDomListener(window, 'load', init_map);
         </script>
         <style>

            #map-outer {  height: 440px; 
                  padding: 20px; 
                border: 2px solid #CCC; 
                margin-bottom: 20px; 
                background-color:#FFF }
          #map-container { height: 400px }
          @media all and (max-width: 991px) {
          #map-outer  { height: 650px }
          }
          </style>
          <h1>Plan d'accès</h1>
          <div class="row">
            <div id="map-outer" class="col-md-12">
                <div id="address" class="col-md-4">
                  <h2>Notre position</h2>
                  <address>
                  <strong>MIRIADE INNOVATION</strong><br>
                      Campus EffiScience <br>
                      2 Esplanade Anton Philips <br>
                      14460 COLOMBELLES<br>
                      FRANCE
                 </address>
                </div>
              <div id="map-container" class="col-md-8"></div>
            </div><!-- /map-outer -->
          </div> <!-- /row -->
        </div>
        <?php include('aside.inc'); ?>

      </div>
      <!-- /.row -->

      <footer>
        <p>&copy; Miriade 2015</p>
      </footer>
    </div> <!-- /container -->

      <?php include('footer.inc'); ?>