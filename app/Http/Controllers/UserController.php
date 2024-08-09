<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $books = Book::paginate(6);
        return view('index', compact('books'));
    }

    public function myBooks()
    {
        if (auth()->check()) {
            $user = User::where('id', auth()->id())->first();
            // relationship
            $userBook = $user->books;
            return view('mybooks', compact('userBook'));
        } else {
            return redirect('/')->with('status', 'error')->with('title', 'Sign in to unlock this feature');
        }
    }
}
