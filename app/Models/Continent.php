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

    //relacion entre continente y paises
    //continent: Abuelo
    //region: papa
    //country: nieto
    public function paises(){
        //parameters
        //1-Nieto
        //2- papa
        //3- Fk del abuelo en el papa
        //4 - Fk del padre en el nieto
        return $this->hasManyThrough(Country::class, Region::class, 'continent_id', 'region_id'->withpivot('official'));
    }
    public function pais(){
        //parameters
        //1-Nieto
        //2- papa
        //3- Fk del abuelo en el papa
        //4 - Fk del padre en el nieto
        return $this->hasManyThrough(Country::class, Region::class, 'continent_id', 'region_id');
    }

}
