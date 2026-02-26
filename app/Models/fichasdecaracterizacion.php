<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;
    protected $table = 'tblfichasdecaracterizacion';
protected $primaryKey = 'nis';
    protected $fillable = [
        'codigo', 'denominacion', 'cupo', 'fechainicio', 'fechafin',
         'observaciones', 'tblcentrosdeformacion_nis', 'tblprogramasdeformacion_nis'];

    public $timestamps = false;


    public function centrodeformacion()
    {
        return $this->belongsTo(CentrosDeFormacion::class, 'tblcentrosdeformacion_nis', 'nis');
    }


}



