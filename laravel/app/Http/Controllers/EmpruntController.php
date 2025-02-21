<?php

namespace App\Http\Controllers;


use App\Models\Emprunt;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;



class EmpruntController extends Controller
{

    

    public function borrow(Request $request)
    {
        // Enregistre l'emprunt
        $book = Book::findOrFail($request->book_id);
        Emprunt::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);


        return redirect()->route('profile');
    }

    public function return(Emprunt $borrow)
    {
        $borrow->update(['returned_at' => now()]);
        return redirect()->route('books.index');
    }


    public function returnBook(Emprunt $borrowing)
    {
        if ($borrowing->returned_at) {
            return back()->withErrors(['returned_at' => 'Already returned']);
        }

        $borrowing->update(['returned_at' => now()]);

        $book = $borrowing->book;
        

        return redirect()->route('profile.index');
    }
    
}


