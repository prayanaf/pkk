@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold text-yellow-400">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-6">
        @if(isset($books) && count($books) > 0)
            @foreach($books as $book)
                <div class="bg-gray-800 p-5 rounded-lg shadow-lg text-center">
                    <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-60 object-cover rounded">
                    <h2 class="mt-3 text-xl font-semibold text-white">{{ $book->title }}</h2>
                    <p class="text-gray-400">{{ $book->author }}</p>
                    <p class="mt-2 text-yellow-400 font-bold">${{ number_format($book->price, 2) }}</p>
                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="mt-3 px-4 py-2 bg-yellow-400 text-black font-semibold rounded-lg hover:bg-yellow-500">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="text-center text-gray-400 col-span-full">No books available.</p>
        @endif
    </div>
</div>
@endsection
