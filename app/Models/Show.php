<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'theater_id',
        'schedule',
        'day',
    ];


    //Relación uno a muchos
    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }

    //Muchos a uno
    public function movie(){
        return $this->belongsTo('App\Models\Movie');
    }

    //Muchos a uno
    public function theater(){
        return $this->belongsTo('App\Models\Theater');
    }
}
