<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

    <div class="max-w-4xl mx-auto">

        <a href="{{ route('books.index') }}" class="inline-block mb-6 text-gray-600 hover:text-blue-600">
            ← Back to Library
        </a>

        <div class="bg-white rounded-lg shadow p-6 mb-8 flex items-center gap-6">
            <div
                class="bg-blue-100 text-blue-600 w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold">
                {{ substr($user->name, 0, 1) }} </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-600">{{ $user->email }}</p>
                <div class="mt-2">
                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                        Membership ID: {{ $user->membership_number ?? 'N/A' }}
                    </span>
                    <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-2">
                        Role: {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-4">📚 My Borrowed Books</h2>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="p-4">Book Name</th>
                        <th class="p-4">Author</th>
                        <th class="p-4">Borrowed Date</th>
                        <th class="p-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($user->borrowedBooks as $book)
                        <tr>
                            <td class="p-4 font-semibold text-gray-800">
                                {{ $book->name }}
                            </td>

                            <td class="p-4 text-gray-600">
                                {{ $book->author }}
                            </td>

                            <td class="p-4 text-blue-600 font-medium">
                                {{ \Carbon\Carbon::parse($book->pivot->borrowing_date)->format('Y-m-d') }}
                            </td>

                            <td class="p-4 text-red-600 font-medium">
                                {{ \Carbon\Carbon::parse($book->pivot->return_date)->format('Y-m-d') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="p-4 text-gray-500 italic text-center" colspan="4">
                                You haven't borrowed any books yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
