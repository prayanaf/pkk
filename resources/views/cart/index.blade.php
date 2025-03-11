@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(session('cart') as $id => $book)
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full rounded">
                <h2 class="mt-2 font-semibold text-lg">{{ $book->title }}</h2>
                <p class="text-gray-500">{{ $book->author }}</p>
                <p class="mt-2 text-blue-600 font-bold">${{ number_format($book->price, 2) }}</p>
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button class="mt-2 bg-red-600 text-white px-4 py-2 rounded w-full">Remove</button>
                </form>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">Your cart is empty.</p>
    @endif
</div>
@endsection
