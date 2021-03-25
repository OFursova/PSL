<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
            {{ __('Lawyers') }}
        </h2>
        </div>
    </x-slot>

    {{-- To do - sorting by spec --}}
    
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
                    <td class="py-3 px-6 text-left whitespace-normal">{{$lawyer->name}}</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->specs ? $lawyer->specs->pluck('name')->join(',') : ''}}</td>
                    <td class="py-3 px-6 text-center">{{$lawyer->email}}</td>
                    <td class="py-3 px-6 text-center">{{$lawyer->phone}}</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center flex-wrap">
                        <x-button-link href="/lawyers/{{$lawyer->id}}" class="m-3 bg-blue-500 hover:bg-blue-700 active:bg-blue-900">See details</x-button-link>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    </div>
</x-app-layout>
