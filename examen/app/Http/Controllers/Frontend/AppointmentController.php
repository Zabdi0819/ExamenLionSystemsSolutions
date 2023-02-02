<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use App\Models\Appointment;
use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MRUse;
use Carbon\Carbon;
use Hamcrest\Core\HasToString;

class AppointmentController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        $appointment = Appointment::all()->sortBy('hr_start')->sortBy('date');
        return view('frontend.appointment.viewAppointment', compact('appointment'));
    }

    public function add($id)
    {
        $hours = [];
        $v = 0;
        for($i=9; $i<=20; $i++){
            $hours[$v] = $i;
            $v++;
        }
        $customer = Customer::find($id);
        $mr = MeetingRoom::all();
        return view('frontend.appointment.add', compact('customer', 'mr', 'hours'));
    }

    public function insert(Request $request, $id)
    {
        $appointment = new Appointment();
        $s = $request -> input('hr_start');
        $start = Carbon::createFromFormat('H', $s);
        $appointment -> hr_start = $start;
        $date = Carbon::createFromFormat('d/m/Y', $request -> input('date')) -> format('Y-m-d');
        $appointment -> date = $date;

        


        $mr = MeetingRoom::find($request -> input('mr_id'));
        
        $appointment -> customer_id = $id;
        $appointment -> mr_id = $request -> input('mr_id');
        $appointment -> folio = "LION".rand(1111, 9999);
        

        
        //$start = Carbon::createFromFormat('H:i', $request -> input('hr_start'))-> format('H:i');
        
        

        $price = $mr -> price_hour;
        if($request -> input('qty') == 1){
            $e = (int)$s +1;
            $end = Carbon::createFromFormat('H', $e);
            
            $appointment -> hr_end = $end;
            $appointment -> total =  $price;

            $hruse = new MRUse();
            $hruse -> mr_id = $request -> input('mr_id');
            $hruse -> date = $date;
            $hruse -> hr_start = $start;
            $hruse -> save();
        } 
        else
        {
            $e = (int)$s +2;
            $end = Carbon::createFromFormat('H', $e);
            $appointment -> hr_end = $end;
            $price = $price * 2;
            $appointment -> total =  $price;
            $second_hr = (int)$s;
            for($x=0; $x<2; $x++){
                $hruse = new MRUse();
                $second_hr2 = Carbon::createFromFormat('H', $second_hr);
                $hruse -> mr_id = $request -> input('mr_id');
                $hruse -> date = $date;
                $hruse -> hr_start = $second_hr2;
                $hruse -> save();
                $second_hr ++;
            }
        }

        $appointment -> save();
        return redirect('customer') -> with('status', "Cita agendada exitosamente");
    }

}
