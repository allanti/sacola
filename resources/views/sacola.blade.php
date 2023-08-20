@extends('principal')

@section('conteudo')
<div>
<button class="btn-small blue"  style="margin-right: 235px;margin-left: 127px;" id="imprimir"  onclick="printDiv()"><i class="material-icons right"></i>Imprimir</button>
</div>
    <div class="row">
        <div class="col  l2 offset-l4">
            <input type="text" class="datepicker" name="data" id="data" >
            <label for="data" style="font-size: 18px">Data do relatório</label>
        </div>
        <div class="col l1">
        <button class="btn-small green"  style="margin-right: 235px;margin-left: 72px;margin-top: 21px;" id="buscar" nome="buscar" onclick="enviaData()">
        <i class="material-icons right"></i>Buscar</button>
        </div>
    </div>
<div class="row" style="margin-top:10px" id="retirar" name="retirar">

    <div class="col l9 offset-l1" id="impressao">
        <table class="striped centered">
            <thead style="background-color: #a6a6a6">
                <div style="text-align:center; font-size:30px">
                    Relatorio de retirada e devolução de sacolas
                </div>
                <tr>
                    <th>MATRICULA</th>
                    <th>NOME</th>
                    <th>RETIRADA</th>
                    <th>DEVOLUCAO</th>
                    <th>DATA</th>
                    <th>TOTAL VENDA</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sacola as $r)
                <tr>
                <input type="hidden" id="id" name="id" value="{{ $r->id }}">
                <td>{{ $r->matricula_operador }}</td>
                <td>{{ $r->nome_operador}}</td>
                <td>{{ $r->retirada }}</td>
                <td>{{ $r->devolucao}}</td>
                <td>{{ $r->data}}</td>
                <td>{{ $r->sobra }}</td>
                <td><a class="waves-effect waves-light btn-small modal-trigger" id="atualizars" href="atualizas?id={{$r->id}}">atualizar</a></td>
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
    <li><a class="btn-floating yellow darken-1" href="/sacola/sacola"><i class="modal-trigger material-icons" href="#modal1">supervisor_account</i></a></li>
    <li><a class="btn-floating blue" href="/"><i class="material-icons">home</i></a></li>
  </ul>
</div>
</div>
<script>
  var diaSemana = [ 'Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado' ];
  var mesAno = [ 'Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro'           , 'Dezembro' ];
  var data = new Date();
  var mes = data.getMonth()+1;
  var hoje = data.getDate() + '/' + mes + '/' + data.getFullYear();
  $(".datepicker").datepicker({
    monthsFull: mesAno,
    monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
    weekdaysFull: diaSemana,
    weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
    weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
    selectMonths: true,
    selectYears: true,
    clear: false,
    format: 'dd/mm/yyyy',
    today: "Hoje",
    close: "X",
    min: new Date(data.getFullYear() - 1, 0, 1),
    max: new Date(data.getFullYear() + 1, 11, 31),
    closeOnSelect: true
  });
  document.getElementById("data").defaultValue = hoje;

function enviaData(){
    var data = $("#data").val();
    window.location.replace("http://10.127.236.100:8080/sacola/public/busca?data="+data);
}

</script>
@stop
