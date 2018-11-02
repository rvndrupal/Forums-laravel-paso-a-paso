<?php

namespace App;

use Illuminate\Support\Facades\App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'replies';

    protected $fillable = ['user_id', 'post_id', 'reply', 'attachment'];

    protected $appends = ['forum']; //para poder interactuar con el forum

    protected static function boot() {
        parent::boot();

        static::creating(function ($reply) {
            if (! App::runningInConsole()) {
                $reply->user_id = auth()->id();
               // self::notifyPostOwner($reply);
            }
        });
    }

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
