<?php
namespace App\Http\Controllers;

ini_set("display_errors", 0 );

error_reporting(0);
use Illuminate\Support\Facades\DB;
use Request;
use App\Sacola;
use App\Operador;
use DateTime;

class SacolaController extends Controller
{
    public function atualiza(){
    	//Pega os dados digitados no formulario
        $dataForm = Request::all();
		//pega o valor do botao que foi precionado sendo: 1 = retirada e 0 = devolucao
		$operacao = $dataForm["botao"];
		//pega a matricula digitada
        $matricula = ltrim($dataForm["matricula"], '0');
        $nomeOperador = DB::select('select * from operador where id = '.$matricula);
		if($nomeOperador != null){
			$nomeOperador = $nomeOperador[0]->nome;
		}
		//busca os dados usando como parametro a matricula e a data
		$resultado = DB::select('select * from sacolas where matricula_operador = '.$matricula.' and '.'data = '.'"'.date('Y-m-d').'"');
		//utiliza uma função para verificar qual ação sera tomada no banco de dados
		$acao = $this->verificaRegistro($matricula, $resultado);
		//caso o valor do botao precionado seja 1 entra nesse if
		if($operacao == 1){
			//usa o valor retornado da função de verificação para tomar uma ação
			if( $acao == 1){
				//pega os dados necessarios
				$restante = $resultado[0]->retirada;
				$devolucao = $resultado[0]->retirada + $dataForm['sacola'];
				$devolucao = $devolucao - $resultado[0]->devolucao;
				//atualiza o registro (ele ira entra no if caso ja tenha um registro no banco)
				DB::table('sacolas')
				->where('data',date('Y-m-d'))->where('matricula_operador',$matricula)
				->update(['retirada' => $dataForm['sacola'] + $restante, 'sobra' => $devolucao]);
				//retorna para pagina inicial
				return redirect('/')->with('alert', $dataForm['sacola'].' sacolas retiradas por '.$nomeOperador.' com sucesso!!');
			//caso usuario ainda nao tenha pego sacola ele ira cair nesse elseif
			}elseif($acao == 2){
				//adicioina novo registro
				DB::table('sacolas')->insert(['matricula_operador' => $matricula, 'retirada' => $dataForm['sacola'], 'devolucao' => 0,'sobra' => $dataForm['sacola'], 'data' => date('Y-m-d'), 'nome_operador' => $nomeOperador]);
                //retorna para pagina inicial
				return redirect('/')->with('alert', $dataForm['sacola'].' sacolas retiradas por '.$nomeOperador.' com sucesso!!');
			//caso o usuario nao tenha cadastro entra no else
			}else{
				//mostra mensagem de erro pedindo para cadastrar usuario
				return redirect('/')->with('alert2', 'Operador(a) ainda não cadastrado');
			}
		//caso o botao precionado seja o de remover entra no else
		}else{
			//verifica qual ação ira tomar
			if( $acao == 1){
				if($dataForm['sacola'] <= $resultado[0]->retirada){
					//operação para atualizar valor da sobra
					$restante = $resultado[0]->devolucao;
					$devolucao = $resultado[0]->devolucao + $dataForm['sacola'];
					$devolucao = $resultado[0]->retirada - $devolucao;

					//atualiza o registro
					DB::table('sacolas')
					->where('data',date('Y-m-d'))->where('matricula_operador',$matricula)
					->update(['devolucao' => $dataForm['sacola'] + $restante, 'sobra' => $devolucao]);
					return redirect('/')->with('alert', $dataForm['sacola'].' sacolas devolvidas por '.$nomeOperador.' com sucesso!!');
				}else{
					return redirect('/')->with('alert2', 'Valor da devolução não pode ser maior que a retirada');
				}
			}elseif($acao == 2){
				//caso operador nao tenha registro na tabela sacolas quer dize que ele ainda nao pegou sacola
				echo "Esse(a) operador(a) ainda não pegou sacola";
				//volta para pagina inicial
				return redirect('/')->with('alert2', 'Esse(a) operador(a) ainda não retirou sacola.');
			//caso usuario nao tenha cadastro entra no else
			}else{
				//mostra mensagem de erro pedindo para cadastrar usuario
				return redirect('/')->with('alert2', 'Operador(a) ainda não cadastrado');
			}
		}
		return redirect('/inicio');
	}
	//função que verifica os dados
	public function verificaRegistro($matricula, $resultado){
		//verifica se o operador esta cadastrado e se existe registro na tabela sacolas
		if(operador::find($matricula) && $resultado != null){
				return 1;
			//verifica se o operador esta cadastrado mas nao possui cadastro na tabela sacolas
			}elseif(operador::find($matricula) && $resultado == null){
				return 2;
			//caso o operador ainda nao tenha sido cadastrado
			}else{
				return 3;
			}
    }

    public function atualizas(){
        $dataForm = Request::all();
        $resultado = DB::select('select * from sacolas where '.'id = '.'"'.$dataForm['id'].'"');
		return view('atualizaSacola')->with('sacola', $resultado);

    }

    public function atualizacao(){
        $dataForm = Request::all();
        $vendida = $dataForm['retirada'] - $dataForm['devolucao'];
        DB::table('sacolas')
		->where('id',$dataForm["id"])
		->update(['retirada' => $dataForm['retirada'], 'devolucao' => $dataForm['devolucao'], 'sobra' => $vendida]);
        return redirect('/sacola');
    }

    function busca(){
    	$resultado = DB::select('select * from sacolas where '.'data = '.'"'.date('Y-m-d').'"');

		return view('sacola')->with('sacola', $resultado);

    }
    function buscaData(){
        $dataForm = Request::all();
        $data = $dataForm['data'];
        $data = $this->dateEmMysql($data);
        $resultado = DB::select('select * from sacolas where '.'data = '.'"'.$data.'"');

		return view('sacola')->with('sacola', $resultado);

    }

    function dateEmMysql($dateSql){
        $date = DateTime::createFromFormat('d/m/Y', $dateSql);
        $date =  $date->format('Y-m-d');

        return $date;
	}

	    function buscaGeral(){
        $dataForm = Request::all();
        if($dataForm == null){
             $resultado = DB::select('select matricula_operador, SUM(sobra) as total  from sacolas where data = "'.date('Y-m-d').'"
                    group by matricula_operador order by total desc' );
        }else{
            $dataInicial = $this->dateEmMysql($dataForm['datainicial']);
            $dataFinal = $this->dateEmMysql($dataForm['datafinal']);
            $resultado = DB::select('select matricula_operador, SUM(sobra) as total  from sacolas where data
                    between "'.$dataInicial.'" and "'.$dataFinal.'"
                        group by matricula_operador order by total desc' );
        }
        $dados1 = [];
        $count = 0;
        foreach ($resultado as $r) {
            $matricula = $r->matricula_operador;
			$nome = DB::select('select nome_operador from sacolas where matricula_operador = '.$matricula.' limit 1');
            $dados2 = ["matricula"=> $matricula, "nome" => $nome[0]->nome_operador, "total" => $r->total];
            $dados1[$count] = $dados2;
            $count = $count + 1;
        }
        return view('relatorio')->with('dados', $dados1);
    }

}
