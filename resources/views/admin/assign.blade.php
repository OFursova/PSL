<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                Assign {{$types[0]}} to {{$types[1]}}
            </h2>
            <x-button-link href="{{url()->previous()}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
                {{ __('Back') }}
            </x-button-link>
        </div>
    </x-slot>
    
    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
        @if (session('success'))
        <div class="w-5/6 mx-auto p-3 text-center bg-green-300 rounded shadow text-gray-800 text-lg">{{session('success')}}</div>
        @elseif (session('failure'))
        <div class="w-5/6 mx-auto p-3 text-center bg-red-300 rounded shadow text-gray-800 text-lg">{{session('failure')}}</div>
        @endif

        <x-form>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
             <!-- Form -->
            <form action="/admin/assign" method="POST" class="flex flex-col items-center justify-around flex-nowrap">
                @csrf
                <div class="flex items-start justify-around flex-wrap w-full mb-3">
                <div class="m-3 w-2/5">
                    <x-label for="alpha" :value="ucwords($types[0])" />
                    <x-select id="alpha" :name="$types[0]" autocomplete="alpha" :collection="$alpha" :selected="null" />
                </div>
                <div class="m-3 w-2/5">
                    <x-label for="beta" :value="ucwords($types[1])" />
                    <x-select id="beta" :name="$types[1]" autocomplete="beta" :collection="$beta" :selected="null" />
                </div>
                </div>
                <x-button class="my-1 mr-4 self-center bg-green-500 hover:bg-green-700">
                    {{ __('Assign') }}
                </x-button>
            </form>
        </x-form>
    </div>

</x-app-layout>
