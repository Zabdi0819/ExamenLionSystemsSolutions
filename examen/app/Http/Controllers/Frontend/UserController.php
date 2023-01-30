<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
        $user -> lname = $request -> input('last_name');
        $user -> phone = $request -> input('phone');
        $user -> email = $request -> input('email');
        $user -> update();
        return redirect('index')->with('status', "Perfil actualizado satisfactoriamente");
    }
}
