<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $books = Book::count();
        $users = User::count();
        return view('admin.dashboard',compact('books', 'users'));
    }

    public function showAllBooks(){
        $booksAll = Book::paginate(5);
        return view('admin.all-books', compact('booksAll'));
    }

    
    public function deleteBook($id){
        $book = Book::findOrFail($id);
        Book::destroy($id);
        return redirect()->route('admin.all-books')->with('status', 'Book deleted successfully');
    }

    public function allUsers(){
        $usersAll = User::paginate(5);
        return view('admin.users', compact('usersAll'));
    }

}
