<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'address', 'tel', 'email', 'coordinates', 'number', 'att_number', 'ogrn', 'inn'
    ];

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }

    public function cats()
    {
        return $this->belongsToMany('App\Models\Cat');
    }
}
