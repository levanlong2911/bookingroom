<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Room_list;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $room_lists = Room_list::all();
        // dd($request->date);
        $date = $request->date;
        $dem = count($room_lists);
        // dd($dem);
        return view('booking.home.index', compact('room_lists', 'date'));
    }

    public function book($id, Request $request)
    {
        $room_list = Room_list::find($id);
        $times = Time::all();
        if($request->isMethod('post'))
        {
            $position = Auth::user()->position;
            if($position == 'Trưởng phòng' || $position == 'Giám đốc' || $position == 'Thư ký')
            {
                $room = new Room;
                $room->fill($request->all());
                $room['user_id'] = Auth::user()->id;
                if($room->save())
                {
                    return redirect()->route('home.index');
                } else {
                    return redirect()->back()->with('fail', __('message.error_booking'));
                }
            } else {
                return redirect()->back()->with('fail', __('message.error.book'));
            }
            
        }
        return view('booking.home.book', compact('room_list', 'times'));
    }
}
