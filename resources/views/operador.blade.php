@extends('principal')

@section('conteudo')
<div class="row" style="margin-top:10px">
    <div class="col l9 offset-l1">
        <table class="striped centered">
            <thead style="background-color: #a6a6a6">
            <div style="text-align:center; font-size:30px">
                    Relatorio de operadores cadastrados
                </div>
                <tr>
                    <th>MATRICULA</th>
                    <th>NOME</th>
                    <th>EXCLUIR</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($operador as $r)
                <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->nome}}</td>
                <td><a href="excluir?id={{$r->id}}" style="color:#f57c00"><i class="Medium material-icons">delete</i></a></td>
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">add</i>
  </a>
  <ul>
    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
    <li><a class="btn-floating yellow darken-1" href="sacola"><i class="modal-trigger material-icons" href="#modal1">supervisor_account</i></a></li>
    <li><a class="btn-floating blue" href="inicio"><i class="material-icons">home</i></a></li>
  </ul>
</div>
</div>
@stop
