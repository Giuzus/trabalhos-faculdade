<DOCTYPE html>
<html>
  <head>
    <base href="http://localhost/transportadora/">
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
  <ul id="more-dropdown" class="dropdown-content">
    <li><a href="clientes">Clientes</a></li>
    <li><a href="rotas">Rotas</a></li>
    <li><a href="#!">three</a></li>
    <li class="divider"></li>
  </ul>
    <nav class="light-blue lighten-1" role="navigation">
		  <div class="nav-wrapper container">
        <a id="logo-container" href="pages/home" class="brand-logo">
          Transportadora
        </a>
        <ul class="right">
          <li>
            <a href="funcionarios">Funcionários</a>
          </li>
          <li>
            <a href="veiculos">Veículos</a>
          </li>
          <li>
            <a class="dropdown-button" href="#!" data-activates="more-dropdown">Mais<i class="material-icons right">arrow_drop_down</i></a>
          </li>
        </ul>
      </div>
    </nav>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="content/imported/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="content/imported/materialize/js/materialize.min.js"></script>

    <?php require_once('routes.php'); ?>

  <body>
<html>