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
                        <x-button-link href="{{asset('/dashboard')}}" class="ml-4 self-end bg-gray-300 hover:bg-gray-500 active:bg-gray-600">
                            {{ __('Dashboard') }}
                        </x-button-link> 
                        {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a> --}}
                        @else
                        <x-button-link href="{{asset('/home')}}" class="ml-4 self-end bg-gray-300 hover:bg-gray-500 active:bg-gray-700">
                            {{ __('Explore') }}
                        </x-button-link> 
                        {{-- <a href="'{{ url('/home') }}'" class="text-sm text-gray-700 underline">Explore</a> --}}
                        @endif
                    @else
                        <x-button-link href="{{asset('/login')}}" class="ml-4 self-end bg-gray-300 hover:bg-gray-500 active:bg-gray-700">
                            {{ __('Log in') }}
                        </x-button-link>
                        {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a> --}}

                        @if (Route::has('register'))
                        <x-button-link href="{{asset('/register')}}" class="ml-4 self-end bg-gray-300 hover:bg-gray-500 active:bg-gray-700">
                            {{ __('Register') }}
                        </x-button-link>
                            {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a> --}}
                        @endif
                    @endauth
                </div>
            @endif
        
        <div class="max-w-screen flex items-center justify-center flex-wrap pt-8">
            <div class="flex justify-center px-3 sm:px-6 lg:px-8 pt-8 sm:justify-start sm:pt-0">
                <x-application-logo class="h-16 w-auto text-gray-700 sm:h-20"/>
            </div>
            <div class="px-3 sm:px-6 lg:px-8">
                <h1 class="text-6xl text-indigo-500">Pearson Specter Litt</h1>
                <p>Fighting for justice since 1988</p>
            </div>
            <div class="px-3 sm:px-6 lg:px-8 py-3 mt-10 flex items-center justify-between w-full bg-gray-200">
                <div>
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
                <div>
                    <div class="m-3 inline-flex rounded-md shadow">
                      <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Get legal aid
                      </a>
                    </div>
                    <div class="m-3 inline-flex rounded-md shadow">
                      <a href="/about" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Learn more
                      </a>
                    </div>
                </div>
            </div>    
        </div>
        <hr class="bg-indigo-400">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" x-data="lawyers()" x-init="fetchLawyers()">
            <h2 class="text-2xl mx-auto py-4 text-indigo-500 text-center">Our team:</h2>  
            <div class="flex justify-between items-start flex-wrap">
                <template x-for="lawyer in lawyers" :key="lawyer.name">
                    <div class="flex flex-col items-center justify-between lg:w-1/6 md:w-1/5 sm:w-1/4 p-3 m-3 border shadow rounded bg-white">
                        <div class="h-40 overflow-hidden"><img :src="lawyer.avatar" :alt="lawyer.name" class="w-full"></div>
                        <h3 class="pt-3 text-lg font-semibold text-indigo-600" x-text="lawyer.name"></h3>
                        <p class="text-sm py-1" x-text="lawyer.position"></p>
                        <template x-for="spec in lawyer.specialization">
                        <p class="text-gray-400 text-sm" x-text="spec.name"></p>
                        </template>
                    </div>
                </template>
            </div>
        </div>
        </div>
                
        <script>
            function lawyers() {
                return {
                    lawyers: [],
                    fetchLawyers: function () {
                        this.error = this.lawyers = null;
                        axios
                            .get("/api/lawyers")
                            .then((response) => {
                                console.log(response.data.data);
                                this.lawyers = response.data.data;
                            })
                            .catch((error) => {
                                this.error = error.response.data.message || error.message;
                            });
                    },
                };
            }
    </script>
    </body>
</html>
