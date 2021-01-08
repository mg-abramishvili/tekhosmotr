<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    public function techpoints()
    {
        return $this->belongsToMany('App\Models\Techpoint');
    }
}
