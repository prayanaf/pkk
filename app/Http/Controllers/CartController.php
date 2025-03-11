<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id) {
        $book = Book::find($id);
        $cart = session()->get('cart', []);
        $cart[$id] = $book;
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function remove($id) {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
}
