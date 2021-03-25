<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lawyer\'s profile') }}
        </h2>
        <x-button-link href="{{asset('/lawyers')}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>

    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6 flex items-start justify-between">
        <div class="w-1/3">
                <div class="flex flex-col items-center justify-center">
                    <img src="{{asset($lawyer->avatar)}}" alt="{{$lawyer->name}}" class="w-3/4 border">
                    <x-button-link href="/contact" class="my-3 text-center bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Contact {{$lawyer->name}}</x-button-link>
                </div>
        </div>
        <table class="table-auto min-w-max w-2/3 bg-white shadow-md rounded">
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Full name:</td>
                    <td class="py-3 px-6 text-center whitespace-nowrap">{{$lawyer->name}}</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Specialization:</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->specs ? $lawyer->specs->pluck('name')->join(',') : ''}}</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Email:</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->email}}</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Contact phone:</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->phone}}</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Post address:</td>
                    <td class="py-3 px-6 text-center max-w-xs">{{$lawyer->address}}</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Cases in progress:</td>
                    <td class="py-3 px-6 text-center">Unset</td>
                </tr>
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Clients:</td>
                    <td class="py-3 px-6 text-center">Unset</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>