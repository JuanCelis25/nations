<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //la tabla a conectar
    protected $table = "continents";
    //la clave primaria de esa tabla
    protected $primaryKey = "continent_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion entre continente y sus regiones
    public function regiones(){
        //Paremeters
        // 1. linked model
        //foreign key of current model 
        // into related model Region 
        return $this->hasMany(Region::class, 'continent_id');
    }
}
