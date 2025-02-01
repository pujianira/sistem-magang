<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-black">
    <div class="flex min-h-screen">
        @if($user->peran === 'Pembina')
            @include('layouts.sidebarp')
        @elseif($user->peran === 'Pembimbing')
            @include('layouts.sidebarm')
        @elseif($user->peran === 'Pendaftar')
            @include('layouts.sidebard')
        @endif
        
        <div class="flex-1 p-6 flex flex-col items-center">
            <h1 class="text-2xl font-bold mb-8 text-center">{{ __('Profil') }}</h1>
            
            <div class="p-6 bg-white shadow-lg rounded-lg w-full max-w-4xl">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="mt-6 p-6 bg-white shadow-lg rounded-lg w-full max-w-4xl">
                @include('profile.partials.update-password-form')
            </div>

            <div class="mt-6 p-6 bg-white shadow-lg rounded-lg w-full max-w-4xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</body>
</html>
