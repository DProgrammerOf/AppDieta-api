<?php

namespace App\Http\Endpoints;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Diario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class DiarioEndpoint extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function all(): mixed
    {
        return [
            'success' => true,
            'message' => '',
            'diaries' => Diario::get()
        ];
    }

    public function get(int $id): mixed
    {   
        return [
            'success' => true,
            'message' => '',
            'diary' => Diario::find($id)
        ];
    }

    public function today(): mixed
    {
        return [
            'success' => true,
            'message' => '',
            'diaries' => Diario::whereBetween('date_at', [
                Carbon::today('America/Sao_Paulo')->startOfDay(),
                Carbon::today('America/Sao_Paulo')->endOfDay()
            ])->get()
        ];
    }

    public function store(Request $request): mixed
    {
        // Validando os campos enviados pelo cliente
        $validation = Validator::make(
            $request->all(),
            [
                'date' => ['required', 'date'],
                'foods' => ['required']
            ]
        );
        if ($validation->fails()) {
            return [
                'success' => false,
                'message' => $validation->getMessageBag()->all()[0]
            ];
        }
        // Criando o objeto e inserindo no banco
        $Diary = new Diario();
        $Diary->date_at = $request->date;
        $Diary->alimentos = $request->foods;
        if (!$Diary->save()) {
            return [
                'success' => false,
                'message' => 'Não foi possível registrar a refeição'
            ];
        }
        // Retornando mensagem de sucesso
        return [
            'success' => true,
            'message' => 'Refeição registrada com sucesso',
            'diaries' =>  Diario::get()
        ];
    }
}
