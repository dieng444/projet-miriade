


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../dist/css/bootstrap-select.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- Large modal -->

    <!-- Connexion Modal : start -->
    <div class="modal fade bs-example-modal-lg" id="connexionModal" tabindex="-1" role="dialog" aria-labelledby="myConnexionModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="gridSystemModalLabel">Identifiez-vous</h2>
          </div>
          <div class="modal-body">
            <form class="form-signin">
              <div class="form-group">
                <input type="email" class="form-control" id="loginId" placeholder="Login">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passId" placeholder="Mots de passe">
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
            <button type="button" class="btn btn-primary">Sign in</button>
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
                <input type="email" class="form-control" id="loginId" placeholder="Login">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passId" placeholder="Mots de passe">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="passIdConfirm" placeholder="Confirmer mots de passe">
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

    
  </body>
</html>
