<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'technical_id',
        'latitude',
        'longitude',
        'location_time',
    ];
}
