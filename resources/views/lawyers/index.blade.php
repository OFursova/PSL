<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
            {{ __('Lawyers') }}
        </h2>

        <form action="/lawyers/filter" method="POST" class="flex items-center justify-between flex-wrap">
            @csrf
        <x-filter-l-select name="type" />
        <x-input class="block mt-1 w-30 mx-3" type="text" name="filter" :value="old('filter')" autofocus />
        <x-button class="my-1 mr-4 self-end bg-purple-500 hover:bg-purple-700 active:bg-purple-900">
            {{ __('Filter') }}
        </x-button>
        </form>

        <x-button-link href="{{url()->previous()}}" class="ml-4 my-1 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>
    
    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
        <div class="flex justify-between items-start flex-wrap">
            @foreach ($lawyers as $lawyer)
                <div class="flex flex-col items-center justify-between lg:w-1/6 md:w-1/5 sm:w-1/4 p-3 m-3 border shadow rounded bg-white">
                    <div class="h-40 overflow-hidden"><img src="{{asset($lawyer->avatar)}}" alt="{{$lawyer->name}}" class="w-full rounded"></div>
                    <h3 class="pt-3 text-lg font-semibold text-indigo-600">{{$lawyer->name}}</h3>
                    <p class="text-sm py-1">{{$lawyer->position->name ?? ''}}</p>
                    <p class="text-gray-400 text-sm">{{$lawyer->specs ? $lawyer->specs->pluck('name')->join(', ') : ''}}</p>
                    <p class="text-sm py-1">{{$lawyer->email}}</p>
                    <p class="text-sm py-1">{{$lawyer->phone}}</p>
                    <div class="flex item-center justify-center flex-wrap">
                        <x-button-link href="/lawyers/{{$lawyer->id}}" class="m-3 bg-blue-500 hover:bg-blue-700 active:bg-blue-900">See details</x-button-link>
                    </div>
                </div>
            @endforeach          
        </div>
    </div>
</x-app-layout>
