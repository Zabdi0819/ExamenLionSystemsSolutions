<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MRUse extends Model
{
    use HasFactory;
    protected $table = 'm_r_uses';
    protected $fillable = [
        'mr_id',
        'date',
        'hr_start',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'app_id', 'id');
    }
}
