<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = ['user_id', 'post_id', 'reply', 'attachment'];

    protected $appends = ['forum']; //para poder interactuar con el forum

    public function post() {
    	return $this->belongsTo(Post::class);
    }

    public function author() {
    	return $this->belongsTo(User::class, 'user_id'); //se le dice el id de User para el autor
    }

    public function getForumAttribute() { //formato get Mayuscula y Attribute
        return $this->post->forum;  //la magia para conectar desde el reply o respuesta con post y forum
        //regresa el foro de esta respuesta
    }
}
