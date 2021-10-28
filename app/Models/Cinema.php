<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'direction',
    ];

    //Relación uno a muchos
    public function theaters(){
        return $this->hasMany('App\Models\Theater');
    }
}
