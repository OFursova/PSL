<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lawyer\'s profile') }}
        </h2>
        <x-button-link href="{{url()->previous()}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
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
                <x-show-page-tr><x-slot name="title">Full name:</x-slot>{{$lawyer->name}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Specialization:</x-slot>{{$lawyer->specs ? $lawyer->specs->pluck('name')->join(', ') : ''}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Email:</x-slot>{{$lawyer->email}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Contact phone:</x-slot>{{$lawyer->phone}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Post address:</x-slot>{{$lawyer->address}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Position:</x-slot>{{$lawyer->position->name ?? '-'}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Assigned cases:</x-slot>
                    @if ($lawyer->cases)
                    @foreach ($lawyer->cases as $item)
                    <p>{{$loop->iteration.'. '.$item->name}}</p>
                    @endforeach
                    @endif
                </x-show-page-tr>
            </tbody>
        </table>
    </div>
</x-app-layout>