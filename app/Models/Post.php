<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Authenticatable
{
   //protected $table = 'posts';

   //definiamo da post la relazione con user 1-1
   public function user(){
       return $this->belongsTo("User");
   }
   //quella con i like di tipo N-N
   public function like(){
    return $this->hasMany("Like");
   }
    //quella con i commenti di tipo N-N
   public function comment(){
    return $this->hasMany("Comment");
   }
}

