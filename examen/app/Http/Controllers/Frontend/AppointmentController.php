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
use Psy\Readline\Hoa\Console;

class AppointmentController extends Controller
{
    //Constructor para definir el lenguaje de Carbon
    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
        //Muestra la lista de reservas ordenadas por fechas
        $appointment = Appointment::all()->sortBy('hr_start')->sortBy('date');
        return view('frontend.appointment.viewAppointment', compact('appointment'));
    }

    public function add($id)
    {
        /**El horaro de reservas es de 9:00 A.M. hasta las 8:00 P.M de lunes a domingo.
         * Para solo permitir las reservas en ese horario, se llena un arreglo y se pasa como parámetro a la vista.
         * El rango se va a mostrar en el componente de select.
         * También se pasan como parámetros los datos del cliente seleccionado y la lista de las salas de juntas
         * en existencia.
         */
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
        //Formateo de fecha y hora para que MySQL no marque error.
        $start = Carbon::createFromFormat('H', $s);
        $date = Carbon::createFromFormat('d/m/Y', $request -> input('date')) -> format('Y-m-d');
        $mrs = $request -> input('mr_id');

        /**Si la sala no tiene reserva en la fecha y hora seleccionada, se realiza la reserva, de lo contraio,
         * mostrará el mensaje correspondiente
         */
        if(MRUse::where('mr_id', $mrs)->where('date', $date)->whereTime('hr_start', $start)->exists())
        {
            return redirect('btn-insert-app/'.$id) -> with('status', "Esta sala ya está reservada en la hora y fecha seleccionada");
        }
        else
        {
            $mr = MeetingRoom::find($request -> input('mr_id'));
        
            $appointment -> customer_id = $id;
            $appointment -> mr_id = $request -> input('mr_id');
            $appointment -> folio = "LION".rand(1111, 9999);
            $appointment -> hr_start = $start;
            $appointment -> date = $date;

            $price = $mr -> price_hour;
            /**
             * De acuerdo al número de horas seleccionadas será la hora de fin.
             * Se realizan dos insert, uno en la tabla de appointments y otro en la tabla de m_r_uses, esto con 
             * la finalida de poder tener a la mano todas las horas reservada, especialmente si la sala se reserva por
             * dos horas.
             */
            if($request -> input('qty') == 1){
                $e = (int)$s +1;
                $end = Carbon::createFromFormat('H', $e);
                
                $appointment -> hr_end = $end;
                $appointment -> total =  $price;

                $hruse = new MRUse();
                
                $hruse -> mr_id = $request -> input('mr_id');
                $hruse -> date = $date;
                $hruse -> hr_start = $start;
                //Insert en tabla de appointments
                $appointment -> save();
                $hruse -> app_id = $appointment -> id;
                //Insert en tabla de m_r_uses
                $hruse -> save();
            } 
            else
            {
                /**
                 * Se suma una hora a la hora de inicio para validar que la sala se pueda reservar por dos horas
                 * si así se desea, de lo contrario, solo se podrá reservar por una.
                 * Esta es la utilidad de la tabla de las horas en uso (m_r_uses)
                 */
                $s2 = (int)$s +1;
                $start2 = Carbon::createFromFormat('H', $s2);
                if(MRUse::where('mr_id', $mrs)->where('date', $date)->whereTime('hr_start', $start2)->exists())
                {
                    return redirect('btn-insert-app/'.$id) -> with('status', "Esta solo se puede reservar por una hora");
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
                        //Insert en tabla de appointments
                        $appointment -> save();
                        $hruse -> app_id = $appointment -> id;
                        //Insert en tabla de m_r_uses
                        $hruse -> save();
                        $second_hr ++;
                    }
                }
            }
            
            return redirect('customer') -> with('status', "Cita agendada exitosamente");
        }
    }

    public function edit($id)
    {
        /**
         * Para solo permitir las reservas en ese horario, se llena un arreglo y se pasa como parámetro a la vista.
         * El rango se va a mostrar en el componente de select.
         * También se pasan como parámetros los datos de la reserva y la lista de las salas de juntas
         * en existencia.
         */
        $hours = [];
        $v = 0;
        for($i=9; $i<=20; $i++){
            $hours[$v] = $i;
            $v++;
        }
        $mr = MeetingRoom::all();
        $appointment = Appointment::find($id);
        return view('frontend.appointment.update', compact('appointment', 'hours', 'mr'));
    }

    public function destroy($id)
    {
        /**
         * Si se elimina una reserva, también se eliminan los registros que correspondan a la reserva
         * en la tabla de m_r_uses
         */
        $hruse = MRUse::where('app_id', $id);
        $appointment = Appointment::find($id);
        $hruse -> delete();
        $appointment -> delete();
        return redirect('appointment')->with('status', "Cita eliminada exitosamente");
    }
}
