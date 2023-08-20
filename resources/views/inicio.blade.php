@extends('principal')

@section('conteudo')
<div class="row">
	<form class="col s5 offset-s4" action="atualiza" method="post" id="form">
		<input type="hidden" name="_token"  value=" {{ csrf_token() }} ">
		<input type="hidden" name="id" value="1">
		<div class="row" style="margin-top: 25px">
	        <div class="input-field col s7">
	          <input id="matricula" name="matricula" type="text" class="validate" required data-length="6" autofocus="autofocus" onfocus="this.select()">
	          <label for="matricula" style="font-size: 18px">Digite a matricula</label>
	        </div>
	        <div class="input-field col s4">
	          <input id="sacola" name="sacola" type="text" class="validate" value="20" required max="100" style="text-align: center;">
	          <label for="sacola" style="font-size: 18px">N° Sacolas</label>
            </div>
            <input id="operacao" name="botao" type="hidden" value=''>
	    </div>
	    <div class="row">
	    	<div class="col l4 offset-l1">
	    		<button class="waves-effect waves-light btn-large modal-trigger" id="adicionar" onClick="retirada()" >Retirar</button>
	    	</div>
	    	<div class="col l4 ">
	    		<button class="waves-effect waves-light btn-large red modal-trigger"  style="float:right" id="retirar" onClick="devolucao()"><i class="material-icons right"></i>Devolver</button>
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
    <li><a class="btn-floating red" href="sacola"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1"><i class="modal-trigger material-icons" href="#modal1">supervisor_account</i></a></li>
    <li><a class="btn-floating blue" href="inicio"><i class="material-icons">home</i></a></li>
  </ul>
</div>
</div>
@stop
