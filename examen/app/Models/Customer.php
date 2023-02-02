<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'last_name',
        'phone',
        'email',
    ];

    //Relación uno a muchos con la tabla de citas
    public function appointments(){
        return $this -> hasMany(Appointment::class);
    }
}
