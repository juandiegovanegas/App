<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $table = 'tblcentrosdeformacion';
    protected $primaryKey  = 'nis';

    protected $fillable = [
     'codigo', 'denominacion', 'direccion', 'observaciones', 'tblregionales_nis'];

    public $timestamps = false;
}
