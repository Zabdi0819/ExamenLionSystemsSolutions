<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MeetingRoom;
use Illuminate\Http\Request;

class MeetingRoomController extends Controller
{
    public function index()
    {
        return view('frontend.meetingroom.viewMeetingRoom');
    }

    public function insert(Request $request)
    {
        $mr = new MeetingRoom();
        if($request-> hasFile('image'))
        {
            $file = $request -> file('image');
            $ext = $file -> getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file -> move('assets/uploads/salas/', $filename);
            $mr -> image = $filename;
        }
        $mr -> name = $request -> input('name');
        $mr -> description = $request -> input('description');
        $mr -> capacity = $request -> input('capacity');
        $mr -> price_hour = $request -> input('price_hour');
        $mr -> save();
        return redirect('mr') -> with('status', "Sala agregada exitosamente");
    }

    public function update(Request $request, $id)
    {
        $mr = MeetingRoom::find($id);
        $mr -> name = $request -> input('name');
        $mr -> description = $request -> input('description');
        $mr -> capacity = $request -> input('capacity');
        $mr -> price_hour = $request -> input('price_hour');
        $mr -> update();
        return redirect('mr')->with('status', "Sala actualizada exitosamente");
    }

    public function destroy($id)
    {
        $mr = MeetingRoom::find($id);
        $mr -> delete();
        return redirect('mr')->with('status', "Sala eliminada exitosamente");
    }


}
