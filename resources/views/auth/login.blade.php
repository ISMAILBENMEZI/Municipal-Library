<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Library System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl overflow-hidden">

        <div class="bg-blue-600 p-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-2">Welcome Back! 👋</h2>
            <p class="text-blue-100">Please login to access your library account.</p>
        </div>

        <div class="p-8">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-5">
                    <label for="email" class="block text-gray-700 font-bold mb-2 text-sm">Email Address</label>
                    <input id="email" type="email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('email') border-red-500 @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter your email">

                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-gray-700 font-bold text-sm">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-blue-600 hover:underline" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <input id="password" type="password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition @error('password') border-red-500 @enderror"
                        name="password" required autocomplete="current-password" placeholder="••••••••">

                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex items-center mb-6">
                    <input class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" type="checkbox"
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-2 block text-sm text-gray-700 cursor-pointer" for="remember">
                        Remember Me
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-lg transform hover:-translate-y-1">
                    🚀 Login to Dashboard
                </button>

                {{-- <div class="mt-6 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Register Now</a>
                </div> --}}

            </form>
        </div>
    </div>

</body>

</html>
