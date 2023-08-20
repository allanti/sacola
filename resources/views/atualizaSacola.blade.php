@extends('principal')

@section('conteudo')
<form action="atualizacao" method="post">
    <div class="container">
        <div class="row">
            @foreach ($sacola as $r)
            <h4 style="text-align:center">Atualizando dados de {{$r->nome_operador}}</h4><br>
            <input type="hidden"  name="id" value="{{$r->id}}">
            <input type="hidden" name="_token"  value=" {{ csrf_token() }} ">
            <div class="input-field col s3">
                <input disabled id="matricula" name="matricula" type="text" value="{{$r->matricula_operador}}">
                <label for="matricula" style="font-size: 18px">Matricula</label>
            </div>
            <div class="input-field col s3">
                <input disabled id="nome" name="nome" type="text" value="{{$r->nome_operador}}">
                <label for="nome" style="font-size: 18px">nome</label>
            </div>
            <div class="input-field col s3">
                <input id="retirada" name="retirada" type="text" value="{{$r->retirada}}">
                <label for="retirada" style="font-size: 18px">Retirada</label>
            </div>
            <div class="input-field col s3">
                <input id="devolucao" name="devolucao" type="text" value="{{$r->devolucao}}">
                <label for="devolucao" style="font-size: 18px">Devolução</label>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col s3 offset-l5">
                <button class="waves-effect waves-light btn-small modal-trigger">atualizar</button>
            <div>
        <div>
    </div>
</form>

@stop
