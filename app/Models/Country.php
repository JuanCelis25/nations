<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //la tabla a conectar
    protected $table = "countries";
    //la clave primaria de esa tabla
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

     //many to many : Country - lenguage
    //Relacionship
    public function languages(){
        //belongsToMany
        // 1. linked model
        //2. pivot table(intermediate table)
        //foreign key of current model 
        // into related model Region 
        return $this->belongsToMany(Language::class, 'country_languages',
    'country_id', 'language_id');
    }

    //m:1 Country - region
    //relationship
    public function regions(){
        //bllong to method: Parameters
        // 1. Related model
        // 2. Foreign key related model in current model 
        return $this->belongsTo(Region::class, 'region_id');

    }
}
