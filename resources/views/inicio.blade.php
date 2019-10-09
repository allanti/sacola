@extends('principal')

@section('conteudo')
<div class="row">
	<form class="col s5 offset-s4">
		<div class="row" style="margin-top: 25px">
	        <div class="input-field col s7">
	          <input id="matricula" type="text" class="validate">
	          <label for="matricula" style="font-size: 18px">Digite a matricula</label>
	        </div>
	        <div class="input-field col s4">
	          <input disabled id="sacola" type="text" class="validate" value="20" style="text-align: center;">
	          <label for="sacola" style="font-size: 18px">N° Sacolas</label>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col l4 offset-l1">
	    		<a class="waves-effect waves-light btn-large"></i>Adicionar</a>
	    	</div>
	    	<div class="col l4 ">
	    		<a class="waves-effect waves-light btn-large" style="float:right"><i class="material-icons right"></i>RETIRAR</a>
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
<script type="text/javascript">

//floate action buttom
const emensBtns = document.querySelectorAll(".fixed-action-btn");
const floatingBtn = M.FloatingActionButton.init(emensBtns, {
    direction: "top"
});
//floate action buttom

</script>
@stop