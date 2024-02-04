<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (){
        $books = Book::withTrashed()->get();
        return view('client.dash', compact('books'));
    }

    public function store(Request $request){
        $request->validate([
          'reservation_date' => 'required|date',
          'return_date' => 'nullable|date',
      ]);
      
      Reservation::create($request->all());
      return redirect()->route('client.dash')->with('success','Reservation created successfully');
      
     }
  
}
