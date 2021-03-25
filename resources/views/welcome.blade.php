<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pearson Specter Litt LLC</title>

        <link rel="shortcut icon" href="/images/law-scale.svg" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center flex-col min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        @if (Auth::user()->roles->slug == 'admin')
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                        <a href="'{{ url('/home') }}'" class="text-sm text-gray-700 underline">Explore</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center flex-wrap">
            <div class="flex justify-center p-3 pt-8 sm:justify-start sm:pt-0">
                <x-application-logo class="h-16 w-auto text-gray-700 sm:h-20"/>
            </div>
            <div class="p-3 mr-20">
                <h1 class="text-6xl text-indigo-500">Pearson Specter Litt</h1>
                <p>Fighting for justice since 1988</p>
            </div>
            <div class="p-3 mt-10 ml-20">
                <h3 class="text-2xl text-indigo-400">We provide a full range of legal services:</h3>
                <ul class="pl-20">
                    <li class="list-disc">Corporate Law</li>
                    <li class="list-disc">Employment & Discrimination Law</li>
                    <li class="list-disc">Education & Special Education Law</li>
                    <li class="list-disc">College & Student’s Rights Law</li>
                    <li class="list-disc">Mental Health Law</li>
                    <li class="list-disc">Immigration Law</li>
                    <li class="list-disc">Civil Rights, Free Speech & Due Process</li>
                </ul>
            </div>
        </div>

        <div class="w-full mt-8 flex lg:mt-0 lg:flex-shrink-0 p-10 items-center justify-center">
            <div class="inline-flex rounded-md shadow">
              <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Get legal aid
              </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
              <a href="/home" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                Learn more
              </a>
            </div>
          </div>
        </div>
                
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">   
            {{-- TO DO axios recent cases --}}
        </div>

    </body>
</html>
