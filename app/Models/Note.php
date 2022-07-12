<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Note extends Model
{ 
    protected $connection = 'mongodb';

    protected $collection = 'note';
    public $timestamps = false;
    protected $fillable = ['note'];

}