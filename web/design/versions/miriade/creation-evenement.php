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
                  <img class="img-responsive" src="//placehold.it/700x400" alt="">
                </div>
              </div>
            </div>
            <!-- /.row -->

            <!-- Datepicker : start -->
            <script type="text/javascript" src="../../dist/js/moment.js"></script>
            <script type="text/javascript" src="../../dist/js/bootstrap-datetimepicker.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#datetimepicker1').datetimepicker();
                    $('#datetimepicker2').datetimepicker();
                    $('#datetimepicker3').datetimepicker({
                        format: 'LT'
                    });
                    $('#datetimepicker4').datetimepicker({
                        format: 'LT'
                    });
                    
                    $('#datetimepicker1 input').focus(function(){
                      $('#datetimepicker1').show;
                    })
                });
            </script>
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
                        <div class='input-group date' id='datetimepicker2'>
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
                <!--ajout emiliano 16/11/2015 15:44-->
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                      <label>Nb tables</label>
                      <input type="text" class="form-control" placeholder="00">
                    </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                      <label>Durée RDV</label>
                      <input type="text" class="form-control" placeholder="minutes">
                    </div>
                  </div>
                </div>  
                <!--fin ajout emiliano 16/11/2015 15:44-->
              </div>
              <div class="col-md-6">
                <script src="//maps.google.com/maps/api/js?sensor=false"></script>
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
            <!-- bougé tout en bas pour modifier le formulaire complet - emiliano -->
            <!--<div class="row justified" style="margin-top: 20px;">
              <button type="button" class="btn btn-lg btn-success">Créer</button>
            </div>-->
          </div>

          <br>

          <h2>Sessions</h2>
          <div class="session-creation">
            <ul class="list-group" id="sessions">
              <li class="list-group-item"><label><input type="checkbox" value=""><span>Session</span></label> <button type="button" class="glyphicon glyphicon-pencil" aria-hidden="true"></button> <button type="button" class="glyphicon glyphicon-remove removeSession" aria-hidden="true"></button></li>
              <li class="list-group-item"><label><input type="checkbox" value=""><span>Session</span></label> <button type="button" class="glyphicon glyphicon-pencil" aria-hidden="true"></button> <button type="button" class="glyphicon glyphicon-remove removeSession" aria-hidden="true"></button></li>
            </ul>
            <h3 class="session-message"></h3>
            <div class="row" style="margin-top: 20px;">
                <button type="button" class="btn btn-lg btn-success" id="addSessions" data-toggle="modal" data-target="#sessionModal">Ajouter une session</button>
                <script>
                  //supprimer une session
                  var removeSession = function(){
                    $(".removeSession").click(function(){
                      console.log('yoy')
                      $(this).parent("li").remove();
                      //checkSessionExist();
                    });
                  }
                  var checkSessionExist = function(){
                    if($("#sessions").has("li").length){
                      console.log("exist");
                      $(".session-message").html("Cochez la case pour ajouter la session dans le choix des participants.");
                    }
                  }
                  $( document ).ready(function() {
                    $("#addSessionsFromModal").click(function(){
                      var title =  $("#sessionTitle").val();
                      if (title == "") return false;
                      var session =  '<li class="list-group-item"><label><input type="checkbox" value=""><span>'+title+'</span></label> <button type="button" class="glyphicon glyphicon-pencil" aria-hidden="true"></button> <button type="button" class="glyphicon glyphicon-remove removeSession" aria-hidden="true"></button></li>';
                      $("#sessions").append(session);
                      $("#sessionModal").modal('hide');
                      // vider les champs de formulaire de création d'une session
                      $("#sessionTitle").val("");
                      $("#sessionDesc").val("");



                      //accrocher événement de suppression
                      removeSession();
                    });

                    
                    //accrocher un événement de suppression
                    removeSession();
                    checkSessionExist();
                  });
                </script>
              </div>
            
            <!-- /.div -->
          </div>
          <!-- ajout emiliano -->
          <!-- <h2>Partenaires</h2>
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
                <img class="img-responsive" src="//placehold.it/700x400" alt="">
              </div>
            </div>
            <div class="row justified" style="margin-top: 20px;">
              <button type="button" class="btn btn-lg btn-success">Ajouter</button>
            </div>
          </div> --> 
          <!--  fin ajout emiliano --> 
          <!--ajout emiliano 16/11/2015 15:44--> 
          <div class="row justified" style="margin-top: 20px;">
            <button type="button" class="btn btn-lg btn-success">Créer</button>
          </div> 
        </div>
        <?php include('aside.inc'); ?>

      </div>
      <!-- /.row -->

      <footer>
        <p>&copy; Miriade 2015</p>
      </footer>
    </div> <!-- /container -->

      <?php include('footer.inc'); ?>
      