<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomExchange extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_party_id',
        'second_party_id',
        'room_items'
    ];

    public function firstParty()
    {
        return $this->belongsTo(User::class, 'first_party_id');
    }

    public function secondParty()
    {
        return $this->belongsTo(User::class, 'second_party_id');
    }
}
