<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store - Discover Your Next Read</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <!-- Navbar -->
    <nav class="bg-purple-700 p-4 flex justify-between items-center">
        <a href="{{ route('dashboard') }}" class="text-xl font-bold">BookStore</a>
        <div>
            <a href="{{ route('books.index') }}" class="mx-3 hover:text-yellow-400">Books</a>
            <a href="{{ route('cart.index') }}" class="mx-3 hover:text-yellow-400">Cart</a>
            @auth
                <a href="{{ route('dashboard') }}" class="mx-3 hover:text-yellow-400">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="mx-3 hover:text-red-400">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mx-3 hover:text-green-400">Login</a>
                <a href="{{ route('register') }}" class="mx-3 hover:text-blue-400">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Header Section -->
    <header class="text-center py-24 bg-gradient-to-r from-purple-800 to-blue-500">
        <h1 class="text-5xl font-extrabold">Find Your Next Favorite Book</h1>
        <p class="mt-4 text-lg">Explore our vast collection and dive into a new adventure!</p>
        <a href="{{ route('books.index') }}" class="mt-6 inline-block bg-yellow-400 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500">Browse Books</a>
    </header>

    <!-- Books Section -->
    <div class="container mx-auto py-12 px-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if(isset($books) && count($books) > 0)
            @foreach($books as $book)
            <div class="bg-gray-800 p-5 rounded-lg shadow-lg text-center">
                <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-60 object-cover rounded">
                <h2 class="mt-3 text-xl font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-400">{{ $book->author }}</p>
                <p class="mt-2 text-yellow-400 font-bold">${{ number_format($book->price, 2) }}</p>
                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                    @csrf
                    <button class="mt-3 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 w-full">Add to Cart</button>
                </form>
            </div>
            @endforeach
        @else
            <p class="text-center text-gray-400 col-span-full">No books available.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-purple-700 text-center py-6 mt-12">
        <p>&copy; 2025 BookStore. All rights reserved.</p>
    </footer>
</body>
</html>
