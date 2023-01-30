<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    use HasFactory;
    protected $table = 'meeting_room';
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'price_hour',
    ];
}
