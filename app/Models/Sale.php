<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'show_id',
        'quantity',
        'mount'
    ];


    //Muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Muchos a uno
    public function show(){
        return $this->belongsTo('App\Models\Show');
    }


}
