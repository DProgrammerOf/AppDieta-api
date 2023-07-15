<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    protected $table = 'diario';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'alimentos' => 'array',
        'date_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
