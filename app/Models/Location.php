<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'location',
        'map_uri'
    ];

    public function area()
    {
        $this->belongsTo(Area::class);
    }
}
