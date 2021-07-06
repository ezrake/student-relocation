<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'pics_uri',
        'name',
        'description'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
