@extends('principal')

@section('conteudo')
<div class="row">
	<form class="col s5 offset-s4" action="/sacola/atualiza" method="post" id="form">
		<input type="hidden" name="_token"  value=" {{ csrf_token() }} ">
		<input type="hidden" name="id" value="1">
		<div class="row" style="margin-top: 25px">
	        <div class="input-field col s7">
	          <input id="matricula" name="matricula" type="text" class="validate" required data-length="6" autofocus="autofocus" onfocus="this.select()">
	          <label for="matricula" style="font-size: 18px">Digite a matricula</label>
	        </div>
	        <div class="input-field col s4">
	          <input id="sacola" name="sacola" type="text" class="validate" value="20" required min="20" max="100"" style="text-align: center;">
	          <label for="sacola" style="font-size: 18px">N° Sacolas</label>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col l4 offset-l1">
	    		<button href="#modal1" class="waves-effect waves-light btn-large" id="adicionar" name="botao" value="1" ></i>Retirar</button>
	    	</div>
	    	<div class="col l4 ">
	    		<button class="waves-effect waves-light btn-large red"  style="float:right" id="retirar" name="botao" value="0"><i class="material-icons right"></i>Devolver</button>
	    	</div>
		</div>
	</form>
</div>
<div class="row">
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="material-icons">supervisor_account</i></a></li>
    <li><a class="btn-floating blue"><i class="material-icons">home</i></a></li>
  </ul>
</div>
</div>
<script src="sacola.js" rel="stylesheet" type="text/javascript">
@stop