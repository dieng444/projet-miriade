<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Miriade - Evenement</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dist/css/bootstrap-select.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../dist/css/miriade.css" rel="stylesheet">

     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../dist/css/bootstrap-select.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="../../dist/css/datepicker.css" rel="stylesheet">
    <!-- Datepicker : end -->

  </head>

  <body>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron jumbotron-main">
      <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="img/miriade_logo.png" alt="Miriade"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" >
          <ul class="nav navbar-nav">
              <li>
                  <a href="index.php">Accueil du site</a>
              </li>
              <li>
                  <a href="programme.php">Programme</a>
              </li>
              <li>
                  <a href="comment.php">Comment ça marche ?</a>
              </li>
              <li>
                  <a href="contact.php">Contact</a>
              </li>
              <li>
                  <a href="plan.php">Plan d'accès</a>
              </li>
          </ul>
          <form class="navbar-form navbar-right">
            <!-- <div class="form-group input-group-sm">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group input-group-sm">
              <input type="password" placeholder="Password" class="form-control">
            </div> -->
            <a class="btn btn-default" href="creation-evenement.php" role="button">Creation</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexionModal">Connexion</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inscriptionModal">Inscription</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
      <div class="container intro-message">
        <h1>Titre</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-success btn-lg" href="#" role="button" data-toggle="modal" data-target="#inscriptionModal">Inscription &raquo;</a></p>
      </div>
    </div>