<?php

namespace App\Http\Controllers;


use App\Models\Emprunt;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;



class EmpruntController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    $borrowings = Emprunt::with('user', 'book')
        ->where('user_id', $user->id)
        ->whereNull('returned_at')
        ->get();
        
    return view('profile', [
        'borrowings' => $borrowings,
        'user' => $user
    ]);
    }
    

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

    // public function return(Emprunt $borrow)
    // {
    //     $borrow->update(['returned_at' => now()]);
    //     return redirect()->route('bookdetails',);
    // }


    public function return(Emprunt $borrowing)
    {
        $borrowing = Emprunt::findOrFail($borrowing->id);
        
        $borrowing->update(['returned_at' => now()]);      
       

        return redirect()->route('profile');
    }
    
}


