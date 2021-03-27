<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pearson Specter Litt LLC</title>

        <link rel="shortcut icon" href="/images/gavel.svg" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased relative">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <footer class="bg-white border-b-2 w-full">
                <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <div class="px-10 text-xs">
                        <p>&copy; 2021</p>
                        <p>Pearson Specter Litt LLC</p>
                    </div>
                    <div class="px-10 w-1/3 flex items-center justify-center"><img src="{{asset('images/psl-logo-3.png')}}" alt="Pearson Specter Litt Logo" class="w-1/2 rounded m-2"></div>
                    <div class="px-10 text-right text-xs">
                        <p>601 E 54th Street</p>
                        <p>New York City</p>
                        <p>New York</p>
                        <p>10000</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
