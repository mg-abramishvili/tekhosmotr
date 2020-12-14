<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Techpoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'coordinates'
    ];
}
