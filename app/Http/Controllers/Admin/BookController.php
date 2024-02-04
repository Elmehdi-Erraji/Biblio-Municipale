<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::withTrashed()->get();
        $count = Book::count();
        return view('admin.books.index', compact('books','count'));
    }
    public function profil()
    {
        $books = Book::withTrashed()->get();
        return view('client.profile', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'published_at' => 'required',
            'totalCopies' => 'required|integer|min:1',
            'availableCopies' => 'required|integer|min:1|max:'. $request->input('totalCopies'),
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'availableCopies.max' => 'The available copies must not be greater than total copies.',
            'published_at.before_or_equal' => 'The published date must not be in the future.',
        ]
    );

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/books_images', 'public');
            $request['image'] = $imagePath;
        }

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }

    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'published_at' => 'required',
            'totalCopies' => 'required',
            'availableCopies' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('book_image', 'public');
            $request['image'] = $imagePath;

            // Delete the old image if it exists
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
        }

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    public function destroy(Book $book)
    {
        // Soft delete the book
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

    public function delete(Book $book)
    {
        return view('admin.books.delete', compact('book'));
    }

    public function restore($id)
    {
        $book = Book::withTrashed()->find($id);
        $book->restore();
        return redirect()->route('books.index')->with('success', 'Book restored successfully');
    }
}
