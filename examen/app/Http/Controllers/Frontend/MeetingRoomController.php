<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MeetingRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MeetingRoomController extends Controller
{
    public function index()
    {
        $mr = MeetingRoom::all();
        return view('frontend.meetingroom.viewMeetingRoom', compact('mr'));
    }

    public function add()
    {
        return view('frontend.meetingroom.add');
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

    public function edit($id)
    {
        $mr = MeetingRoom::find($id);
        return view('frontend.meetingroom.update', compact('mr'));
    }

    public function update(Request $request, $id)
    {
        $mr = MeetingRoom::find($id);
        if($request-> hasFile('image'))
        {
            $path = 'assets/uploads/product/'.$mr -> image;
            if(File::exists($path))
            {
                File::delete($path);
            }
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
