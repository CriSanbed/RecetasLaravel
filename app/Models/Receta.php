<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //asi evitamos ataques y que no de error de fillable, es decir q estos campos son validos y aceptados por el aplicativo
    protected $fillable = [
        'nombre',
        'ingredientes',
        'preparacion',
        'imagen',
        'categoria_id'
    ];

    
    //OBTENER LA CATEGORIA MEDIANTE LA CLAVE FORANEA
    public function categoriaReceta(){
        //relacion de 1 : 1
        return $this->belongsTo(CategoriaReceta::class, 'categoria_id');
    }
    
    //OBTENER EL AUTOR MEDIANTE LA CLAVE FORANEA
    public function autorReceta(){
        //relacion de 1 : 1
        return $this->belongsTo(User::class, 'user_id');
    }
}
