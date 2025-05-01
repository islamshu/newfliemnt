<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Custom Page' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- إذا كنت تستخدم Vite --}}
    @filamentStyles
</head>
<body class="filament-body bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col">
        {{-- Navigation Bar --}}
        <header class="bg-white shadow p-4">
            <h1 class="text-xl font-bold">{{ $title ?? 'Custom Page' }}</h1>
        </header>

        {{-- Page Content --}}
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>

    @filamentScripts
</body>
</html>
