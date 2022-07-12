<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Authenticatable
{ 
   //definiamo da post la relazione con user 
   public function user(){
       return $this->belongsTo("User");
   }
    //quella con i post
   public function post(){
    return $this->belongsTo("Post");
   }
}