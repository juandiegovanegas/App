<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';

    protected $fillable = [
        'nombre_original',
        'ruta',
        'mime_type',
        'size'
    ];
}