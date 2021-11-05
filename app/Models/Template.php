<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    
    use HasFactory;

    public function plans(){

        return $this->belongsToMany(Plan::class, 'plans');
    }

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'plan_id',
        'pdf_doc'
    ];

}
