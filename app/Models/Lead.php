<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'station', 'date', 'time', 'name', 'phone', 'number', 'category', 'osago'
    ];

    public function techpoints()
    {
        return $this->belongsToMany('App\Models\Techpoint');
    }
}
