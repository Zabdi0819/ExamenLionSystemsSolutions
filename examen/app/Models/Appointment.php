<?php

namespace App\Models;

use App\Models\MRUse;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $fillable = [
        'customer_id',
        'mr_id',
        'folio',
        'date',
        'hr_start',
        'hr_end',
        'total',
    ];

    //Relación uno a uno con la tabla de clientes
    public function customer(){
        return $this -> belongsTo(Customer::class, 'customer_id', 'id');
    }

    //Relación uno a uno con la tabla de sala de juntas
    public function mr(){
        return $this -> belongsTo(MeetingRoom::class, 'mr_id', 'id');
    }

    public function hours()
    {
        return $this -> hasMany(MRUse::class);
    }
}
