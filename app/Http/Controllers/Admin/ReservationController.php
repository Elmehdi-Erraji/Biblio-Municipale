<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
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

    public function store(ReservationRequest $request){

    Reservation::create($request->all());
    
    return redirect()->route('client/dash')->with('success','Reservation created successfully');
    
   }

    public function edit(Reservation $reservation){
        $users = User::all();
        $books = Book::all();

        return view('admin.reservations.edit', compact('reservation','users','books'));
    }

    public function update(ReservationRequest $request, Reservation $reservation){

        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success','Reservation updated successfully');
    
    }

    public function destroy(Reservation $reservation){

        $roleId = auth()->user()->role;
        $reservation->delete();
   
        if ($roleId == 1) {
            return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully');
        } elseif ($roleId == 2) {
            return redirect()->route('profile')->with('success', 'Reservation deleted successfully');
        }
    }
}

//done
