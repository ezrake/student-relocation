<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'county',
        'sub_county'
    ];

    public function locations()
    {
        $this->hasMany(Location::class);
    }

    public function users()
    {
        $this->hasManyThrough(User::class, Location::class);
    }
}
