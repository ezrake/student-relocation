<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'location_id',
        'student_card_uri',
        'institution',
        'campus',
        'year'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function location()
    {
        $this->belongsTo(Role::class);
    }
}
