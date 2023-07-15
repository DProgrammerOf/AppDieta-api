<?php

namespace App\Http\Endpoints;

use App\Models\Alimentos;
use App\Models\Diario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DiarioEndpoint extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function all(): mixed
    {
        return [
            'success' => true,
            'diarios' => Diario::get()
        ];
    }

    public function get(int $id): mixed
    {   
        return [
            'success' => true,
            'alimento' => Diario::find($id)
        ];
    }
}
