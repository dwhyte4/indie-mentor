<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    public function getNumberOfTemplates()
    {
        $id =1;

       
        return Cache::remember('templates',20, function () use ($id){
            return Plan::find($id)->templates()->count();
        });
        

        //
    }



}
