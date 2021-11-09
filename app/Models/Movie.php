<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'runtime',
        'classification',
        'director',
        'actors',
        'sinopsis',
        //'image',
    ];

    //Relación uno a muchos
    public function shows(){
        return $this->hasMany('App\Models\Show');
    }
}
