<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function create_book()
    {
        if (auth()->check()) {
            return view('books.create');
        } else {
            return redirect()->back()->with('status', 'error')->with('title', 'Please login to continue');
        }
    }


    public function store_book(Request $req)
    {
        // return $req->all();

        $req->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'year' => 'required|numeric|min:1000|digits:4',
            'isbn' => 'required'
        ]);

        if ($req->hasFile('image')) {
            $imgfile = $req->file('image');
            $img_name = time() . '.' . $imgfile->extension();
            $path = 'image/books/';
            // upload a img file
            $imgfile->move($path, $img_name);
        }

        $data = [
            'title' => $req->title,
            'author' => $req->author,
            'genre' => $req->genre,
            'image' => $img_name,
            'publication_year' => $req->year,
            'isbn' => $req->isbn,
            'user_id' => auth()->user()->id
        ];

        Book::create($data);
        return redirect('/')->with('status','success')->with('title', 'Book added successfully');
        
    }

    // edit the book
    public function edit_book($id){
        $book = Book::find($id);
        if($book){
            return view('books.edit', compact('book'));
        }else{
            return redirect('/')->with('status', 'error')->with('title', 'Book not found');
        }
    }


    // update book
    public function update_book(Request $req,$id){
        // return $id;
        $book = Book::findOrFail($id);
        if($book){
            $req->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string',
            'year' => 'required|numeric|min:1000|digits:4',
            'isbn' => 'required'
        ]);
            if ($req->hasFile('image')) {
                $path =  'image/books/' . $book->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $req->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('image/books/', $filename);
                $book->image = $filename;
            }

            $book->title = $req->title;
            $book->author = $req->author;
            $book->genre = $req->genre;
            $book->publication_year = $req->year;
            $book->isbn = $req->isbn;
            $book->save();
            return redirect('/')->with('status','success')->with('title', 'Book updated successfully');
        }else{
            return redirect('/')->with('status', 'error')->with('title', 'Book not found');
        }
    
    }
}
