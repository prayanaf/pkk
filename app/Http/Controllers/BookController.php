<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {
    public function index() {
        $books = Book::where('type', 'physical')->get();
        return view('books.index', compact('books'));
    }

    public function ebooks() {
        $books = Book::where('type', 'ebook')->get();
        return view('books.ebooks', compact('books'));
    }

    public function dashboard() {
    $books = Book::all(); // Mengambil semua data buku
    return view('dashboard', compact('books')); // Mengirimkan ke view
    }
}
