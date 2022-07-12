<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   //definiamo le relazioni della classe utente
   //quella con i post dove abbiamo l'utente associato al post che ha pubblicato, è di tipo 1-N
   public function posts(){ 
      //return $this->hasmany(child::class,'foreign_key','local_key');
      // In the above syntax we have used belongsTo method with 3 parameters 
      //so here Child::class is the name of Model which we want to relate, 
      // foreign_key means column name of child table and local_key means column name 
      //of own table.
      return $this->hasMany("Post", "username", "username"); //relazione 1-N
   }

   //quella con i like di tipo N-N
   public function like(){
    return $this->hasMany("Like", "user", "username");
   }
   //quella con i commenti di tipo N-N
   public function comment(){
    return $this->hasMany("Like", "user", "username");
   }

}
