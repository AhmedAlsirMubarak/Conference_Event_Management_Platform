<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SCW</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-linear-to-br from-gray-50 to-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Saudi Climate Week</h1>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-lg shadow-lg p-8 border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Welcome Back</h2>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-700 text-sm font-medium mb-2">Login Failed</p>
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-600 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 text-cyan-600 focus:ring-cyan-500 border-gray-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                        Remember me
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full mt-6 bg-linear-to-r from-cyan-500 to-cyan-600 hover:from-cyan-600 hover:to-cyan-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="grow border-t border-gray-300"></div>
                <span class="px-3 text-sm text-gray-500">or</span>
                <div class="grow border-t border-gray-300"></div>
            </div>

            <!-- Footer Links -->
            <div class="space-y-3 text-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-cyan-600 hover:text-cyan-700 font-medium block">
                        Forgot Your Password?
                    </a>
                @endif

                @if (Route::has('register'))
                    <div class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-cyan-600 hover:text-cyan-700 font-medium">
                            Sign Up
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <p>© 2025 Ahmed Alsir Mubarak. All rights reserved.</p>
        </div>
    </div>
</body>

</html>