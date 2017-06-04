<?php 

namespace App\Http\Controllers;
use App\CepSp;
use App\CepBrasil;

class CepsController extends Controller {


    public function buscar($cep)
    {
        $cep = str_replace("-", "", $cep);

        $result = CepSp::whereDs_cep($cep)->first();

        if(!is_null($result))
        {
            return response()->json([
                'status' => true, 
                'endereco' => $result
            ],200);
        }

        $result = CepBrasil::whereDs_cep($cep)->first();

        if(!is_null($result))
        {
            return response()->json([
                'status' => true, 
                'endereco' => $result
            ],200);
        }

        return response()->json([
            'status' => false, 
            'mensagem' => 'endereço não encontrado.'
        ]);
    }
}
