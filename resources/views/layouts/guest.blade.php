<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LibraFlow') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white">
        <!-- Redesigned guest layout with minimalist white-mode aesthetic -->
        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12">
            <!-- Logo & Branding -->
            <div class="mb-8 text-center">
                <a href="/" class="inline-flex items-center gap-2 mb-6">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-lg">LF</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-900">LibraFlow</span>
                </a>
            </div>

            <!-- Auth Card -->
            <div class="w-full max-w-md">
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
