


   

    <!-- Connexion Modal : start -->
    <div class="modal fade bs-example-modal-lg" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="myConnexionModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="gridSystemModalLabel">Identifiez-vous</h2>
          </div>
          <div class="modal-body">
            <form class="form-signin" id="form-auth" action="#">
              <div class="form-group">
                <input type="email" class="form-control" id="loginId" placeholder="Login" required="required">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passId" placeholder="Mots de passe" required="required">
              </div>
              <div class="checkbox">
                <label>
                  <input value="remember-me" type="checkbox"> Remember me
                </label>
              </div>
              <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inscriptionModal" style="float:left;">Inscription</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="form-auth">Sign in</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Connexion Modal : end -->

    <script type="text/javascript">
      $(document).ready(function(){
        $('#inscriptionModal').on('show.bs.modal', function (e) {
          $('#connexionModal').modal('hide');
        })
      });
    </script>

    <!-- Inscription Modal : start -->
    <div class="modal fade bs-example-modal-lg" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="myInscriptionModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="gridSystemModalLabel">Inscription</h2>
          </div>
          <div class="modal-body">
            <form class="form-signin">
              <div class="form-group">
                <input type="email" class="form-control" id="loginId" placeholder="Login" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passId" placeholder="Mots de passe" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passIdConfirm" placeholder="Confirmer mots de passe" required>
              </div>
              <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
             </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Inscription Modal : end -->

    <!-- Session Modal : start -->
    <div class="modal fade bs-example-modal-lg" id="sessionModal" tabindex="-1" role="dialog" aria-labelledby="mySessionModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3>Ajouter une session</h3>
          </div>
          <div class="modal-body">
            <div class="row" id="nouvelleSession">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Titre</label>
                  <input type="text" class="form-control" placeholder="Titre" id="sessionTitle">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Plage horaire debut</label>
                      <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Plage horaire fin</label>
                      <div class='input-group date' id='datetimepicker4'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" placeholder="Description" style="min-height:220px;" id="sessionDesc"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-lg btn-success elem-full" id="addSessionsFromModal" data-dismis="modal">Ajouter</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Session Modal : end -->

    <!-- Partenaire Modal : start -->
    <div class="modal fade bs-example-modal-lg" id="partenaireModal" tabindex="-1" role="dialog" aria-labelledby="myPartenaireModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3>Ajouter un partenaire</h3>
          </div>
          <div class="modal-body">
            <div class="row well" id="nouveauPartenaire">
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
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-lg btn-success elem-full" id="addSessionsFromModal" data-dismis="modal">Ajouter</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Partenaire Modal : end -->

    
  </body>
</html>
