<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformadores extends Model
{
    use HasFactory;
    protected $table = 'tblentecoformadores';

    protected $fillable = [
        'nis',
        'tdoc',
        'numdoc',
        'razonsocial',
        'direccion',
        'telefono',
        'correoinstitucional'
    ];
    
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;
}
