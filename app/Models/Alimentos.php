<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Alimentos extends Model
{
    protected $table = 'alimentos';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tabela' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
