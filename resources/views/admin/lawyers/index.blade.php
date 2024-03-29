<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
            {{ __('Lawyers') }}
        </h2>

        <form action="/admin/lawyers/filter" method="POST" class="flex items-center justify-between flex-wrap">
            @csrf
        <x-filter-l-select name="type" />
        <x-input class="block mt-1 w-30 mx-3" type="text" name="filter" :value="old('filter')" autofocus />
        <x-button class="my-1 mr-4 self-end bg-purple-500 hover:bg-purple-700 active:bg-purple-900">
            {{ __('Filter') }}
        </x-button>
        </form>

        <x-button-link href="{{asset('admin/lawyers/create')}}" class="ml-4 my-1 self-end bg-green-500 hover:bg-green-700 active:bg-green-900">
                {{ __('Add new lawyer') }}
        </x-button-link>
    </div>
    </x-slot>
    
    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                  <tr class="bg-gray-200 text-gray-600 uppercase text-md md:text-sm sm:text-xs leading-normal">
                    <th class="py-3 px-6 text-center" colspan="2">Lawyer</th>
                    <th class="py-3 px-6 text-center">Specialization</th>
                    <th class="py-3 px-6 text-center">Email</th>
                    <th class="py-3 px-6 text-center">Phone</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                  </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($lawyers as $lawyer)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center"><img class="w-20 rounded" src="{{asset($lawyer->avatar)}}" alt="{{$lawyer->name}}"></td> 
                    <td class="py-3 px-6 text-left whitespace-normal">
                        <p class="font-semibold my-2">{{$lawyer->name}}</p>
                        <p>{{$lawyer->position ? $lawyer->position->name : ''}}</p>
                    </td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->specs ? $lawyer->specs->pluck('name')->join(', ') : ''}}</td>
                    <td class="py-3 px-6 text-center">{{$lawyer->email}}</td>
                    <td class="py-3 px-6 text-center">{{$lawyer->phone}}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center flex-wrap">
                        <x-button-link href="/admin/lawyers/{{$lawyer->id}}" class="m-3 bg-blue-500 hover:bg-blue-700 active:bg-blue-900">See details</x-button-link>
                        <x-button-link href="/admin/lawyers/{{$lawyer->id}}/edit" class="m-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Edit</x-button-link>
                        {!! Form::open(['url' => '/admin/lawyers/'.$lawyer->id, 'method' => 'delete']) !!}
                        <x-button class="m-3 text-center bg-red-500 hover:bg-red-700 active:bg-red-900">Delete</x-button>
                        {!! Form::close() !!}
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    </div>
</x-app-layout>
