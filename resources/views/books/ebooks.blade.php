@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6">E-Books Collection</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full rounded">
            <h2 class="mt-2 font-semibold text-lg">{{ $book->title }}</h2>
            <p class="text-gray-500">{{ $book->author }}</p>
            <p class="mt-2 text-blue-600 font-bold">${{ number_format($book->price, 2) }}</p>
            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                @csrf
                <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded w-full">Add to Cart</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
