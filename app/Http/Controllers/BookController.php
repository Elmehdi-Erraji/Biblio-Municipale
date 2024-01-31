<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view ('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'published_at'=>'required',
            'totalCopies'=>'required',
            'availableCopies'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //handle image upload
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images/books_images','public');
            $request['image'] = $imagePath;
        }

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function show(Book $book){
        return view('books.show', compact('book'));
    }

    public function edit(Book $book){
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book){
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'published_at'=>'required',
            'totalCopies'=>'required',
            'availableCopies'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('book_image','public');
            $request['image'] = $imagePath;

            //delete the old image if it exist

            if($book->image){
                Storage::disk('public')->delete($book->image);
            }
        }

        $book->update($request->all());

        return redirect()->route('book.index')->with('success','Book deleted successfully');
    }

    public function destroy(Book $book){
        //soft delete the book
        $book->delete();
        return redirect()->route('book.index')->with('success','Book deleted successfully');
    }

    public function delete(Book $book){
        return view('books.delete', compact('book'));
    }

    public function restore($id){
        $book = Book::withTrashed()->find($id);
        $book->restore();
        return redirect()->route('books.index')->with('success', 'Book restored successfully');
    }
}
