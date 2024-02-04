<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index (){
        $books = Book::where('availableCopies', '>=', 1)->get();
        return view('client.dash', compact('books'));
    }

    public function profile (){
        
        $user = auth()->user();
        $MyReservations = Reservation::with('book')->where('user_id',$user->id)->get();

        $reservationsCount = $user->reservations()->count();

        return view('client.profile', compact('MyReservations','reservationsCount'));
    }

    public function store(Request $request){
        
        $request->validate([
          'reservation_date' => 'required|date',
          'return_date' => 'nullable|date',
      ]);
      
      Reservation::create($request->all());
      return redirect()->route('profile')->with('success','Reservation created successfully');
      
     }

     
}
