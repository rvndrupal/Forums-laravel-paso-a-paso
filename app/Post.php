<?php

namespace App;
use Illuminate\Support\Facades\App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $table = 'posts';

    protected $fillable = ['forum_id', 'user_id', 'title', 'slug', 'description'];

    //generar las url limpias
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot() {
        parent::boot();

      //crear el id del usuario al momento de crear un post
      static::creating(function($post) {
         if( ! App::runningInConsole() ) {
          $post->user_id = auth()->id();
         // $post->slug = str_slug($post->title, "-");
        }
       
      });
    }

    //funcion que muestra las images generadas esto esta en las rutas
      //'/images/{path}/{attachment}'
    public function pathAttachment() {
      return "/images/posts/" . $this->attachment;
    }




    
    public function forum() {
		return $this->belongsTo(Forum::class,'forum_id');
    }
    
    //propietario
    public function owner() {
		return $this->belongsTo(User::class,'user_id');
  }
  
  public function replies() {
		return $this->hasMany(Reply::class);
  }
  
  
}
