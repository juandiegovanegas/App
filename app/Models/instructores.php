<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TiposDocumentos;
use App\Models\Eps;
use App\Models\RolesAdministrativos;

class Instructores extends Model
{
    use HasFactory;

    protected $table = 'tblinstructores';
    protected $primaryKey = 'nis';
    public $timestamps = false;

    protected $fillable = [
        'numdoc',
        'nombres',
        'apellidos',
        'direccion',
        'telefono',
        'correoinstitucional',
        'correopersonal',
        'sexo',
        'fechanac',
        'tbltiposdocumentos_nis',
        'tbleps_nis',
        'tblrolesadministrativos_nis'
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TiposDocumentos::class, 'tbltiposdocumentos_nis', 'nis');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbleps_nis', 'nis');
    }

    public function rolAdministrativo()
    {
        return $this->belongsTo(RolesAdministrativos::class, 'tblrolesadministrativos_nis', 'nis');
    }
}
