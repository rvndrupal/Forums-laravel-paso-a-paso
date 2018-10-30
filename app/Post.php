<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $table = 'posts';

    protected $fillable = ['forum_id', 'user_id', 'title', 'description'];
    
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
