<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index',compact('reservations')); 
    }

    public function create(){
        $users = User::all();
        $books = Book::all();
        return view('.create', compact('users','books'));
    }

    public function store(Request $request){
      $request->validate([
        'reservation_date' => 'required|date',
        'return_date' => 'nullable|date',
    ]);
    
    Reservation::create($request->all());
    return redirect()->route('client/dash')->with('success','Reservation created successfully');
    
   }

    public function edit(Reservation $reservation){
        $users = User::all();
        $books = Book::all();
 

        return view('admin.reservations.edit', compact('reservation','users','books'));
    }

    public function update(Request $request, Reservation $reservation){

        $request->validate([
                       
            'reservation_date' => 'required|date',
            'return_date' => 'nullable|date',
            'is_returned' => 'required',
            
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success','Reservation updated successfully');
    
    }

    public function destroy(Reservation $reservation){
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success','Reservation deleted successfully');
    
    }
}
