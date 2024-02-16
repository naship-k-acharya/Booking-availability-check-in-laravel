<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserveroom;
use Illuminate\Http\Request;

class ReserveroomController extends Controller
{
    public function addstore(Request $request)
    {
        $reserveroom = new Reserveroom;
        $reserveroom->name = $request->input('name');
        $reserveroom->prize = $request->input('prize');
    
        if($request->hasfile('roomphoto'))
        {
            $file = $request->file('roomphoto');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/roompic/', $filename);
            $reserveroom->roomphoto = $filename;
        }
    
        $reserveroom->save();
        
        // Store the booking data in the session
        $request->session()->put('bookingData', [
            'name' => $reserveroom->name,
            'roomphoto' => $reserveroom->roomphoto,
            // Other relevant data
        ]);
        
        return redirect('/list')->with('sucess', 'Room added successfully.');
    }
    
   public function list()
    {
        $data = Reserveroom::all();
        return view('listroom', ['data' => $data]);
    }
    
    function booking()
    {
        return view('bookingname');
    }
    
    public function showbookdata(Request $request,$id)
    {
       if(Auth::user()){
      $room=Reserveroom::where('id',$id)->first();
     // Retrieve 
     $bookingdata=    $request->session()->get('bookingData');
    //  dd($bookingdata);
      return view('bookingname',compact('room'));
    }
    else
    {
        return redirect(route("login"))->with('sucess','please  login ');
    }
    }
    
}
