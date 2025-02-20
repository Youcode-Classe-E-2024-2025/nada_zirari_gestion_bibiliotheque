<?php

namespace App\Http\Controllers;


use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;



class BorrowController extends Controller
{
    public function borrow(Book $book)
    {
        // Enregistre l'emprunt
        Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
        ]);

        return redirect()->route('books.index');
    }

    public function return(Borrow $borrow)
    {
        $borrow->update(['returned_at' => now()]);
        return redirect()->route('books.index');
    }
}


