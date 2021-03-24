<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
            {{ __('Cases') }}
        </h2>
        {{-- only for lawyers and admin --}}
        
        <x-button-link href="{{asset('cases/create')}}" class="ml-4 self-end bg-green-500 hover:bg-green-700 active:bg-green-900">
                {{ __('Add new case') }}
        </x-button-link>
    </div>
    </x-slot>

    {{-- To do - sorting by spec --}}
    
    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                  <tr class="bg-gray-200 text-gray-600 uppercase text-md md:text-sm sm:text-xs leading-normal">
                    <th class="py-3 px-6 text-left">Case title</th>
                    <th class="py-3 px-6 text-center">Specialization</th>
                    <th class="py-3 px-6 text-center">Started</th>
                    <th class="py-3 px-6 text-center">Ended</th>
                    <th class="py-3 px-6 text-center">Result</th>
                    <th class="py-3 px-6 text-center">Details</th>
                  </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($cases as $case)
                    {{-- {{dd($cases)}} --}}
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-normal">{{$case->name}}</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$case->specs ? $case->specs->pluck('name')->join(',') : ''}}</td>
                    <td class="py-3 px-6 text-center">{{$case->start ? $case->start : 'not started yet'}}</td>
                    <td class="py-3 px-6 text-center">{{$case->end ? $case->end : 'in progress'}}</td>
                    <td class="py-3 px-6 text-center">
                        @if ($case->result === 1) <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Won</span>
                        @elseif ($case->result === 0) <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Lost</span>
                        @else -
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                        <x-button-link href="{{asset('cases/'.$case->id)}}" class="my-3 self-end bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">See more</x-button-link>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    </div>
</x-app-layout>
