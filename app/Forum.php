<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable=['name','description' , 'slug'];


    //generar las url limpias

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function replies() { //relacion a distancia
        return $this->hasManyThrough(Reply::class, Post::class);
        
        // se conecta con la clase reply y a travez de post nos podemos conectar
	}
}
