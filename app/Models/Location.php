<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'area_id',
        'location',
        'map_uri'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
