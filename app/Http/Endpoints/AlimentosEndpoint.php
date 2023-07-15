<?php

namespace App\Http\Endpoints;

use App\Models\Alimentos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AlimentosEndpoint extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function all(): mixed
    {
        return [
            'success' => true,
            'alimentos' => Alimentos::get()
        ];
    }

    public function get(int $id): mixed
    {   
        return [
            'success' => true,
            'alimento' => Alimentos::find($id)
        ];
    }
}
