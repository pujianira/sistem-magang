{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

{{-- <x-guest-layout>
    <div class="flex justify-between items-center bg-blue-900 p-4">
        <div>
            <!-- <h1 class="text-white text-2xl">MAGANG DISKOMINFO SEMARANG</h1>
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="h-16">
        </div> -->
        <div class="text-white">
            <nav>
                <a href="#" class="mr-4">Home</a>
                <a href="#" class="mr-4">Profil</a>
                <a href="#" class="mr-4">Info Bidang</a>
                <a href="#" class="mr-4">Kontak</a>
                <a href="#" class="bg-orange-500 text-white px-4 py-2 rounded">Daftar</a>
            </nav>
        </div>
    </div>

    <div class="flex justify-center items-center h-screen">
        <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow-md w-1/3">
            @csrf
            <h2 class="text-center text-2xl mb-4">Masuk</h2>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="bg-orange-500 text-white">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>

            <div class="mt-4 text-center">
                <span>Belum mempunyai akun?</span>
                <a href="{{ route('register') }}" class="text-orange-500">Daftar</a>
            </div>
        </form>
    </div>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Diskominfo Kota Semarang</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"> --}}
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white min-h-screen">
    <!-- Header -->
    <header class="bg-dark-blue text-white">
        <div class="container mx-auto flex items-center justify-between py-4">
            <h1 class="text-xl font-bold ml-6">MAGANG</h1>
            <nav>
            <ul class="flex space-x-28 transform -translate-x-6">
                <li><a href="#" class="font-bold hover:text-orange-300">Home</a></li>
                <li><a href="#" class="font-bold hover:text-orange-300">Profil</a></li>
                <li><a href="#" class="font-bold hover:text-orange-300">Info Bidang</a></li>
                <li><a href="#" class="font-bold hover:text-orange-300">Kontak</a></li>
                <li>
                    <a href="{{ route('register') }}" 
                    class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600">
                    Daftar
                    </a>
                </li>
            </ul>
            </nav> 
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto flex items-center justify-between py-30">
        <!-- Logo Section -->
        <div class="w-1/2 flex justify-center">
            <!-- <img src="{{ asset('img/logodiskominfo.png') }}" alt="Logo Diskominfo" style="width: 400px; height: auto;" class="h-48"> -->
        </div>
        
        <!-- Login Form Section -->
        <div class="w-1/2 bg-dark-blue text-white p-40 shadow-lg" style="margin-left: -5px; width: 60%">
            <h1 class="text-3xl font-bold text-center mb-8">Masuk</h1>

            <!-- Session Status -->
            @if(session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" class="block w-full border rounded-md px-4 py-2 mt-1 text-gray-900" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-sm text-orange-yellow">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <div class="relative flex items-center mt-1">
                        <input id="password" class="block w-full border rounded-md px-4 py-2 text-gray-900" type="password" name="password" required>
                        <span class="absolute right-0 pr-3 flex items-center cursor-pointer" onclick="togglePasswordVisibility()">
                            <svg id="eyeIcon" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                {{-- <div class="flex items-center mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500" name="remember">
                        <span class="ml-2 text-sm">Ingat saya</span>
                    </label>
                </div> --}}

                <div class="flex items-center justify-between mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500" name="remember">
                        <span class="ml-2 text-sm">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-white hover:underline">Lupa password?</a>
                    @endif
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-orange-400 text-white font-bold block w-full py-2 px-4 rounded-lg hover:bg-orange-500">Masuk</button>
                </div>
            </form>

            <div class="mt-4 text-left">
                <p class="text-sm">Belum mempunyai akun? <a href="{{ route('register') }}" class="text-orange-500 hover:underline">Daftar</a></p>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.478 0-8.268-2.943-9.542-7z" />';
            }
        }
    </script>
</body>
</html>