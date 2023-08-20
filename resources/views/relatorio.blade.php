@extends('principal')

@section('conteudo')
<div>
<button class="btn-small blue"  style="margin-right: 235px;margin-left: 127px;" id="imprimir"  onclick="printDiv()"><i class="material-icons right"></i>Imprimir</button>
</div>
    <div class="row">
        <div class="col  l2 offset-l4">
            <input type="text" class="datepicker" name="datainicial" id="datainicial" >
            <label for="datainicial" style="font-size: 18px">Data inicial</label>
        </div>
        <div class="col  l2 offset-8">
            <input type="text" class="datepicker" name="datafinal" id="datafinal" >
            <label for="datafinal" style="font-size: 18px">Data final</label>
        </div>
        <div class="col l1">
        <button class="btn-small green"  style="margin-right: 235px;margin-left: 72px;margin-top: 21px;" id="buscar" nome="buscar" onclick="enviaData()">
        <i class="material-icons right"></i>Buscar</button>
        </div>
    </div>
<div>
<div class="row" style="margin-top:10px" id="retirar" name="retirar">
    <div class="col l9 offset-l1" id="impressao">
        <table class="striped centered">
            <thead style="background-color: #a6a6a6">
                <div style="text-align:center; font-size:30px">
                    Relatorio de Total de vendas por periodo
                </div>
                <tr>
                    <th>MATRICULA</th>
                    <th>NOME</th>
                    <th>TOTAL VENDA</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            @foreach ($dados as $r)
                <tr>
                <td>{{ $r['matricula'] }}</td>
                <td>{{ $r['nome']}}</td>
                <td>{{ $r['total'] }}</td>
                </tr>
             @endforeach
            </tbody>
        </table>
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
document.getElementById("datainicial").defaultValue = hoje;
document.getElementById("datafinal").defaultValue = hoje;
function enviaData(){
    var dataInicial = $("#datainicial").val();
    var dataFinal = $("#datafinal").val();
    window.location.replace("http://10.127.236.100:8080/sacola/public/buscaGeral?datainicial="+dataInicial+"&datafinal="+dataFinal);
}

</script>


@stop
