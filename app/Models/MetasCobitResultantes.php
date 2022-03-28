<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetasCobitResultantes extends Model
{
    use HasFactory;

    protected $table = 'metas_cobit_resultantes';

    protected $fillable = [
        'id',
        'idEmpresa',
        'codigo',
        'fecha',
        'estado'
    ];
}
