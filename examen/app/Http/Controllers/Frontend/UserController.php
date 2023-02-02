<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MRUse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        //Se guarda la hora actual
        $now = Carbon::now('America/Mexico_City')->isoFormat('H');
        //Se crea un formato que acepte MySQL
        $now2 = Carbon::createFromTime($now, 0, 0);
        //Se guarda la fecha actual
        $today = Carbon::today();
        /**
         * Se seleccionan las salas reservadas en la fecha y hora actual.
         * Cada vez que la hora cambia, la sala puede permanecer en uso o se liberará, según sea el caso.
         */
        $currentMr = MRUse::whereTime('hr_start', $now2)-> whereDate('date', $today)-> get();
        return view('frontend.index', compact('currentMr'));
    }

    public function checkout($id)
    {
        /**
         * Si se libera la sala antes de que finalice su tiempo, se elimina la saa de la tabla m_r_uses,
         * sin embargo, la reserva se conserva para mantener el historial.
         * El hecho de que se elimine solo de la tabla m_r_uses permite dejar la tabla de reservas intacta
         * y aún así, liberar la sala.
         */
        $hruse = MRUse::where('app_id', $id);
        $hruse -> delete();
        return redirect('index')->with('status', "Sala liberada");
    }

    public function profile()
    {
        //Muestra los datos del usuario logueado.
        $user = User::where('id', Auth::id())->first();
        return view('frontend.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        //Actualización de los datos del usuario logueado
        $user = User::where('id', Auth::id())->first();
        $user -> name = $request -> input('name');
        $user -> last_name = $request -> input('last_name');
        $user -> phone = $request -> input('phone');
        $user -> email = $request -> input('email');
        $user -> update();
        return redirect('index')->with('status', "Perfil actualizado satisfactoriamente");
    }
}
