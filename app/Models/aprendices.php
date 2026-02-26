<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprendices extends Model
{
    use HasFactory;

    protected $table = 'tblaprendices';
    protected $primaryKey = 'nis';

    public $timestamps = false;
    // 🔥 IMPORTANTE
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'tdoc',
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
        'tblfichasdecaracterizacion_nis'
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TiposDocumentos::class, 'tbltiposdocumentos_nis', 'nis');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbleps_nis', 'nis');
    }

    public function ficha()
    {
        return $this->belongsTo(FichasDeCaracterizacion::class, 'tblfichasdecaracterizacion_nis', 'nis');
    }
}
