<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use App\Operador;

class OperadorController extends Controller
{
    function buscaDados($matricula){
      $resultado = DB::select('select * from operador where id = '.$matricula);

      return $resultado;

    }
    function adiciona(){
        //Pega os dados digitados no formulario
        $dataForm = Request::all();
		//pega a matricula digitada
        $matricula = ltrim($dataForm["matricula2"], '0');
        $exist =$this->buscaDados($matricula);
        //verifica se usuário ja está cadastrado, se estiver, redireciona para tela inicial com alert de erro se nao estiver adiciona o usuário
        if($exist){
            return redirect('/')->with('alert3', 'Operador(a) já esta cadastrado');
        }else{
            DB::table('operador')
            ->insert(['id' => $matricula, 'nome' => $dataForm["nome"]]);
            return redirect('/')->with('alert4', 'Operador(a) cadastrado com sucesso!!');
        }
    }
    function busca(){
      $resultado = Operador::all();

		return view('operador')->with('operador', $resultado);

    }

    function excluir(){
        $dataForm = Request::all();
        $id = $dataForm['id'];
        $operador = Operador::find($id);
        $operador->delete();
        return redirect('inicio')->with('alert5', 'Operador(a) excluido com sucesso!!');

    }
}
