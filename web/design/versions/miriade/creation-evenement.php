<?php include('header.inc'); ?>

    <div class="container">

      <div class="row">
        <div class="col-md-9">

          <h1>Création d'événement</h1>
          <div class="event-creation">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Titre</label>
                  <input type="text" class="form-control" placeholder="Titre">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" placeholder="Description" style="min-height:220px;"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">Image d'événement sur accueil</p>
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date de debut</label>
                      <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date de fin</label>
                      <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Localisation</label>
                  <input type="text" class="form-control" placeholder="Localisation">
                </div>
              </div>
              <div class="col-md-6">
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
                  #map-container { height: 220px }
                  @media all and (max-width: 991px) {
                  #map-outer  { height: 650px }
                  }
                </style>
                <div id="map-container" class="col-md-12"></div>
              </div>
            </div>
            <!-- /.row -->
            <div class="row justified" style="margin-top: 20px;">
              <button type="button" class="btn btn-lg btn-success">Créer</button>
            </div>
          </div>

          <br>

          <h2>Sessions</h2>
          <div class="session-creation">
            <div class="list-group">
              <button type="button" class="list-group-item">Session 1</button>
              <button type="button" class="list-group-item">Session 2</button>
            </div>
              <h3>Ajouter une session</h3>
            <div class="row well">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Titre</label>
                  <input type="text" class="form-control" placeholder="Titre">
                </div>
                <div class="form-group">
                  <label>Plage horaire</label>
                  <input type="text" class="form-control" placeholder="Titre">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" placeholder="Description" style="min-height:220px;"></textarea>
                </div>
              </div>
              <div class="row justified" style="margin-top: 20px;">
                <button type="button" class="btn btn-lg btn-success">Ajouter</button>
              </div>
            </div>
            <!-- /.div -->
          </div>
          <!-- ajout emiliano -->
          <h2>Ajouer un Partenaire</h2>
          <div class="row well">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Partenaire</label>
                  <input type="text" class="form-control" placeholder="Partenaire">
                </div>
                <div class="form-group">
                  <label>Adresse</label>
                  <input type="text" class="form-control" placeholder="Adresse">
                </div>
                <div class="form-group">
                  <label>Mail</label>
                  <input type="text" class="form-control" placeholder="Mail">
                </div>
                <div class="form-group">
                  <label>Téléphone</label>
                  <input type="text" class="form-control" placeholder="Téléphone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">logo</label>
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">Image du partenaire</p>
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </div>
              </div>
              <div class="row justified" style="margin-top: 20px;">
                <button type="button" class="btn btn-lg btn-success">Ajouter</button>
              </div>
            </div>
          <!--  fin ajout emiliano -->  
        </div>
        <?php include('aside.inc'); ?>

      </div>
      <!-- /.row -->

      <footer>
        <p>&copy; Miriade 2015</p>
      </footer>
    </div> <!-- /container -->

      <?php include('footer.inc'); ?>
      