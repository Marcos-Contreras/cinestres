<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'no_seats',
        'cinema_id',
    ];


    //Relación uno a muchos
    public function shows(){
        return $this->hasMany('App\Models\Show');
    }

    //Muchos a uno
    public function cinema(){
        return $this->belongsTo('App\Models\Cinema');
    }
}
