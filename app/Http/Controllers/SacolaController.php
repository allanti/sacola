<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use App\Sacola;
use App\operador;


class SacolaController extends Controller
{
    public function atualiza(){
    	//Pega os dados digitados no formulario
		$dataForm = Request::all();
		//pega o valor do botao que foi precionado sendo: 1 = retirada e 0 = devolucao
		$operacao = $dataForm["botao"];
		//pega a matricula digitada
		$matricula = $dataForm["matricula"];
		//busca os dados usando como parametro a matricula e a data
		$resultado = DB::select('select * from sacolas where matricula_operador = '.$matricula.' and '.'data = '.'"'.date('Y-m-d').'"');
		//utiliza uma função para verificar qual ação sera tomada no banco de dados
		$acao = $this->verificaRegistro($matricula, $resultado);
		//caso o valor do botao precionado seja 1 entra nesse if
		if($operacao == 1){
			//usa o valor retornado da função de verificação para tomar uma ação
			if( $acao == 1){
				//faz a operação para atualizar a coluna sobra
				$restante = $resultado[0]->retirada;
				$devolucao = $resultado[0]->retirada + $dataForm['sacola'];
				$devolucao = $devolucao - $resultado[0]->devolucao;
				//atualiza o registro (ele ira entra no if caso ja tenha um registro no banco)
				DB::table('sacolas')->update(['retirada' => $dataForm['sacola'] + $restante, 'sobra' => $devolucao]);
				//retorna para pagina inicial
				return redirect('/');
			//caso usuario ainda nao tenha pego sacola ele ira cair nesse elseif
			}elseif($acao == 2){
				//adicioina novo registro
				DB::table('sacolas')->insert(['matricula_operador' => $matricula, 'retirada' => $dataForm['sacola'], 'devolucao' => 0,'sobra' => 0, 'data' => date('Y-m-d')]);
				//retorna para pagina inicial
				return redirect('/');
			//caso o usuario nao tenha cadastro entra no else
			}else{
				//mostra mensagem de erro pedindo para cadastrar usuario
				echo "usuário ainda não cadastrado, por favor cadastre o usuário";
				die();
			}
		//caso o botao precionado seja o de remover entra no else
		}else{
			//verifica qual ação ira tomar
			if( $acao == 1){
				//operação para atualizar valor da sobra
				$restante = $resultado[0]->devolucao;
				$devolucao = $resultado[0]->devolucao + $dataForm['sacola'];
				$devolucao = $resultado[0]->retirada - $devolucao;

				//atualiza o registro
				DB::table('sacolas')->update(['devolucao' => $dataForm['sacola'] + $restante, 'sobra' => $devolucao]);
				return redirect('/');
			}elseif($acao == 2){
				//caso operador nao tenha registro na tabela sacolas quer dize que ele ainda nao pegou sacola
				echo "Esse(a) operador(a) ainda não pegou sacola";
				//volta para pagina inicial
				return redirect('/');
			//caso usuario nao tenha cadastro entra no else
			}else{
				//mostra mensagem de erro pedindo para cadastrar usuario
				echo "usuário ainda não cadastrado, por favor cadastre o usuário";
				die();
			}
		}
		return redirect('/inicio');
	}
	//função que verifica os dados
	public function verificaRegistro($matricula, $resultado){
		//verifica se verifica se o operador esta cadastrado e se existe registro na tabela sacolas
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

}
