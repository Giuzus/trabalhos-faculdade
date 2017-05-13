<DOCTYPE html>
<html>
  <head>

	  <title>Materialize sz</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="content/imported/materialize/css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="content/css/site.css" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>

  <body>
    <nav class="light-blue lighten-1" role="navigation">
		  <div class="nav-wrapper container">
        <a id="logo-container" href="?controller=pages&action=home" class="brand-logo">
          Transportadora
        </a>
        <ul class="right">
          <li>
            <a href="?controller=funcionarios&action=list">Funcionários</a>
          </li>
        </ul>
      </div>
    </nav>

    <?php require_once('routes.php'); ?>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="content/imported/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="content/imported/materialize/js/materialize.min.js"></script>

  <body>
<html>