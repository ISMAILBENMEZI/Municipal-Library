<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipal Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-blue-600">📚 Municipal Library</a>
            
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="text-gray-700 hover:text-blue-600 font-semibold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Log in</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-20 text-center px-4">
        <h1 class="text-5xl font-bold text-gray-800 mb-6">Welcome to Your Library</h1>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
            Explore a vast collection of books, manage memberships, and track borrowings efficiently with our new digital system.
        </p>
        
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-semibold shadow-lg hover:bg-blue-700 transition">
                Get Started
            </a>
            <a href="#" class="bg-white text-gray-700 border border-gray-300 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-50 transition">
                Browse Books
            </a>
        </div>
    </div>

    <div class="mt-20 flex justify-center">
        <img src="https://img.freepik.com/free-vector/library-interior-empty-room-reading-with-books-wooden-shelves_107791-1555.jpg" alt="Library" class="rounded-xl shadow-2xl max-w-4xl w-full border-4 border-white">
    </div>

    <footer class="mt-20 py-6 text-center text-gray-500 text-sm">
        &copy; 2026 Municipal Library. All rights reserved.
    </footer>

</body>
</html>