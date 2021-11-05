<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    
    public function users(){
        return $this->hasMany(User::class, 'users');
    }

   

    public function templates(){

        return $this->belongsToMany(Template::class, 'templates');
    }
    
    use HasFactory;
}
