<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Controle de estoque</title>
</head>
<body>
<nav class="nav-extended nav-full-header z-depth-0 orange darken-2">
      <div class="nav-background">
        <div class="ea k" style="background-image: url(&#39;//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/stars.jpg?0&#39;);"></div>
      </div>
      <div class="nav-wrapper db">
        <a href="" class="brand-logo"><i class="material-icons">camera</i></a>
        <a href="" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="bt hide-on-med-and-down">
        	<li><a href="">Inicio</a></li>
         	<li><a href="">Usuários</a></li>
          	<li class="k"><a href="">Relatórios</a></li>
          	<li class="k"><a href="">Estoque</a></li>
        </ul></li>
        </ul>
        <!-- Dropdown Structure -->

      </div>
	<div>
		<div class="center-align">
			<img src="sacolas.png" alt="sacolas" style="width: 104px; margin-right: 236px">
		</div>
  	</div>
      <div class="container nav-header valign-wrapper">
		<div class="row">
			<div class="de center-align">
          		<h2>SISTEMA DE SACOLA</h2>
        	</div>
		</div>
      </div>
    </nav>
@yield('conteudo')
<!--  Scripts-->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>
