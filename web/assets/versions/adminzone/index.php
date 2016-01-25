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
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/bootstrap-select.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../../css/miriade.css" rel="stylesheet">

 <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-select.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="../../css/datepicker.css" rel="stylesheet">
<!-- Datepicker : end -->

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="admin-logo" src="../miriade/img/miriade_logo.png" alt="">
                <div class="panel panel-primary">
                    <div class="panel-heading"><strong class="">Login</strong>

                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="events-list.php" method="post">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="inputEmail3" placeholder="Email" required="" type="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="inputPassword3" placeholder="Password" required="" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label class="">
                                            <input class="" type="checkbox">Remember me</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">Sign in</button>
                                    <button type="reset" class="btn btn-default btn-sm">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">Mot de passe oublié? <a href="#" class="">Retablir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>