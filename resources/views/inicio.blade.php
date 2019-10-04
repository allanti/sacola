@extends('principal')

@section('conteudo')
<div class="row">
	<form class="col s5">
		<div class="row">
	        <div class="input-field col s4">
	          <input id="matricula" type="text" class="validate">
	          <label for="matricula" style="font-size: 18px">Digite a matricula</label>
	        </div>
	        <div class="input-field col s3">
	          <input disabled id="sacola" type="text" class="validate" value="20" style="text-align: center;">
	          <label for="sacola" style="font-size: 18px">N° Sacolas</label>
	        </div>
	    </div>
	</form>
</div>
@stop