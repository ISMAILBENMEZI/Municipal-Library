<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Book::create([
            'name' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('librarian.dashboard')->with('success', 'Book added successfully!');
    }

    public function borrow($id)
    {
        $book = Book::findOrFail($id);

        if ($book->status !== 'available') {
            return back()->with('error', 'Sorry, this book is already borrowed by someone else.');
        }

        $today = now();
        $nextMonth = now()->addMonth();

        Borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,

            'borrowing_date' =>$today,
            'return_date' => $nextMonth,
        ]);

        $book->update(['status' => 'borrowed']);

        return redirect()->route('books.index')->with('success', 'Book borrowed successfully!');
    }
}
