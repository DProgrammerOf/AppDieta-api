<?php

namespace App\Http\Endpoints;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Alimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlimentosEndpoint extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function all(): mixed
    {
        return [
            'success' => true,
            'message' => '',
            'food' => Alimentos::get()
        ];
    }

    public function get(int $id): mixed
    {   
        return [
            'success' => true,
            'message' => '',
            'food' => Alimentos::find($id)
        ];
    }
    
    public function store(Request $request): mixed
    {
        // Validando os campos enviados pelo cliente
        $validation = Validator::make(
            $request->all(),
            [
                'rotulo' => ['required', 'max:200'],
                'tabela.calorias' => ['required', 'numeric'],
                'tabela.carboidratos' => ['required', 'numeric'],
                'tabela.fibra' => ['required', 'numeric'],
                'tabela.gorduras' => ['required', 'numeric'],
                'tabela.proteinas' => ['required', 'numeric'],
                'tabela.sodio' => ['required', 'numeric']
            ]
        );
        if ($validation->fails()) {
            return [
                'success' => false,
                'message' => $validation->getMessageBag()->all()[0]
            ];
        }
        // Criando o objeto e inserindo no banco
        $Food = new Alimentos();
        $Food->rotulo = $request->rotulo;
        $Food->tabela = $request->tabela;
        if (!$Food->save()) {
            return [
                'success' => false,
                'message' => 'Não foi possível salvar o alimento'
            ];
        }
        // Retornando mensagem de sucesso
        return [
            'success' => true,
            'message' => 'Alimento salvo com sucesso'
        ];
    }
}
