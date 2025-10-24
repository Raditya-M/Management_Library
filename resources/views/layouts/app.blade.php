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
        <!-- Redesigned layout for white-mode minimalist aesthetic -->
        <div class="min-h-screen flex flex-col bg-white">
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="flex flex-1">
                <!-- Sidebar Navigation -->
                <aside class="hidden md:flex md:flex-col w-64 border-r border-gray-200 bg-white">
                    @include('layouts.sidebar')
                </aside>

                <!-- Page Content -->
                <main class="flex-1 overflow-auto">
                    <!-- Page Header (if provided) -->
                    @isset($header)
                        <header class="bg-white border-b border-gray-200 sticky top-0 z-10">
                            <div class="px-8 py-6">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <!-- Page Content -->
                    <div class="bg-white">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
