<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model

{
    //la tabla a conectar
    protected $table = "regions";
    //la clave primaria de esa tabla
    protected $primaryKey = "region_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //1 to m : Region - Country
    //Relacionship

    public function countries(){
        return $this->hasmany(Country::class, 'region_id');
    }
}
