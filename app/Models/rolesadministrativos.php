<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Models
{
    use HasFactory;
    protected $table = 'tblrolesadministrativos';
    protected $primaryKey  = 'nis';
    public $incrementing = true;

    protected $fillable = [
        'descripcion'];

    public $timestamps = false;
}
