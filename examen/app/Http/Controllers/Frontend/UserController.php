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
        $now = Carbon::now('America/Mexico_City')->isoFormat('H');
        $now2 = Carbon::createFromTime($now, 0, 0);
        $today = Carbon::today();
        $currentMr = MRUse::whereTime('hr_start', $now2)-> whereDate('date', $today)-> get();
        return view('frontend.index', compact('currentMr'));
    }

    public function checkout($id)
    {
        $hruse = MRUse::where('app_id', $id);
        $hruse -> delete();
        return redirect('index')->with('status', "Sala liberada");
    }

    public function profile()
    {
        $user = User::where('id', Auth::id())->first();
        return view('frontend.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        $user -> name = $request -> input('name');
        $user -> last_name = $request -> input('last_name');
        $user -> phone = $request -> input('phone');
        $user -> email = $request -> input('email');
        $user -> update();
        return redirect('index')->with('status', "Perfil actualizado satisfactoriamente");
    }
}
