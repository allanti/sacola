<!DOCTYPE html>
<html>
<head>
    <script src="jquery.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <link rel="stylesheet" href="materialize.min.css">
    <script src="materialize.min.js"></script>
    <link href="icon.css" rel="stylesheet">
    <link href="css.css" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Controle de Sacola</title>

</head>
<body>
<!-- Dropdown Structure -->

<ul id="dropdown1" class="dropdown-content">
  <li><a href="sacola">Sacolas</a></li>
  <li><a href="operador">Operadores</a></li>
  <li><a href="buscaGeral">Venda</a></li>
</ul>

<!-- Dropdown Structure -->

<nav class="nav-extended nav-full-header z-depth-0 orange darken-2">
      <div class="nav-background">
        <div class="ea k" style="background-image: url(&#39;//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/stars.jpg?0&#39;);"></div>
      </div>
      <div class="nav-wrapper db">
        <a href="" class="brand-logo"><i class="material-icons">camera</i>Atacadão</a>
        <a href="" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="bt hide-on-med-and-down">
        	<li><a href="inicio">Inicio</a></li>
         	<li><a class="modal-trigger" href="#modal1" >Usuários</a></li>
          	<li class="k"><a class="dropdown-trigger" data-target="dropdown1">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>
          	<li class="k"><a href="">Estoque</a></li>
        </ul>
      </div>
	<div>
		<div class="center-align">
			<img src="sacolas.png" alt="sacolas" style="width: 104px; margin-right: 373px">
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
<!--------------------------------------------------------------- modal1 - adicionar operador ------------------------------------------------------------------------------------------------------->

<div id="modal1" class="modal" style="width: 540px; border-radius: 18px; border:3px; border-color:orange darken-2">
        <div style="height:60px" class="orange darken-2">
            <h4 style="color:white;padding-top: 7px;padding-left: 64px;">ADICIONAR OPERADOR(A)</h4>
        </div>
    <div class="modal-content">
      <form class="col s5 offset-s2" action="adiciona" method="post" id="form2">
		<input type="hidden" name="_token"  value=" {{ csrf_token() }} ">
		<input type="hidden" name="id" value="1">
		<div class="row" style="margin-top: 25px">
	        <div class="input-field col s12">
	          <input id="nome" name="nome" type="text" class="validate">
	          <label for="nome" style="font-size: 18px">Nome</label>
	        </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
	          <input id="matricula2" name="matricula2" type="text" class="validate">
	          <label for="matricula2" style="font-size: 18px">Matricula</label>
	        </div>
        </div>
	    <div class="row">
	    	<div class="col l4 offset-l1">
	    		<button class="waves-effect waves-light btn-large" id="adicionar" name="botao" >Adiconar</button>
	    	</div>
	    	<div class="col l3 offset-l2" >
	    		<button class=" modal-close waves-effect waves-light btn-large red"  style="float:right" id="cancelar" Onclick="cancelaEnvio()" ><i class="material-icons right"></i>Cancelar</button>
	    	</div>
		</div>
	</form>
    </div>
    <div style="height:40px" class="orange darken-2"></div>
</div>
<!--------------------------------------------------------------- modal1 - adicionar operador ------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------- modal2 ------------------------------------------------------------------------------------------------------->

<div id="modal2" class="modal">

    <div class="modal-content" style="width: 487px">
    <div class="row" style="margin-bottom: 0px">
    <div class="col s12 offset-s2">
        <p style="font-size:20px">Deseja realmente completar está ação?</p>
    </div>
        <div class="row" style="margin-bottom: 0px">
	    	<div class="col l4 offset-l3 ">
	    		<button class="waves-effect waves-light btn-small" id="confirmar" name="botao" onClick="enviarForm()">Confirmar</button>
	    	</div>
	    	<div class="col l3 offset-l1" >
	    		<button class=" modal-close waves-effect waves-light btn-small red"  style="float:right" id="cancelar" Onclick="cancelaEnvio2()" ><i class="material-icons right"></i>Cancelar</button>
	    	</div>
		</div>
    </div>
</div>
<!--------------------------------------------------------------- modal2 ------------------------------------------------------------------------------------------------------->
<script>
//mensagem de confirmação e de erro

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';

    if(exist){
      M.toast({html: msg , classes: 'rounded', classes: 'green darken-1 rounded'});
    }

    var exist2 = '{{Session::has('alert2')}}';
    var msg2 = '{{Session::get('alert2')}}';
    if(exist2){
      M.toast({html: msg2 , classes: 'rounded', classes: 'red darken-1 rounded'});
    }

    var exist3 = '{{Session::has('alert3')}}';
    var msg3 = '{{Session::get('alert3')}}';
    if(exist3){
      M.toast({html: msg3 , classes: 'rounded', classes: 'red darken-1 rounded'});
    }

    var exist4 = '{{Session::has('alert4')}}';
    var msg4 = '{{Session::get('alert4')}}';
    if(exist4){
      M.toast({html: msg4 , classes: 'rounded', classes: 'green darken-1 rounded'});
    }

    var exist5 = '{{Session::has('alert5')}}';
    var msg5 = '{{Session::get('alert5')}}';
    if(exist5){
      M.toast({html: msg5 , classes: 'rounded', classes: 'green darken-1 rounded'});
    }
  </script>

<script src="sacola.js" rel="stylesheet" type="text/javascript">
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>
</html>
