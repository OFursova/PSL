<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Case info') }}
        </h2>
        <x-button-link href="{{url()->previous()}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>

    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
        <table class="table-auto min-w-max w-full bg-white shadow-md rounded">
            <tbody class="text-gray-600 text-sm font-light">
                <x-show-page-tr><x-slot name="title">Case title:</x-slot>{{$case->name}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Specialization:</x-slot>{{$case->specs ? $case->specs->pluck('name')->join(', ') : ''}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Description:</x-slot>{{$case->description}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Started:</x-slot>{{$case->start ? $case->start : 'not started yet'}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Ended:</x-slot>{{$case->end ? $case->end : 'in progress'}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Result:</x-slot>
                    @if ($case->result === 1) <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Won</span>
                    @elseif ($case->result === 0) <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Lost</span>
                    @else -
                    @endif
                </x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Leading lawyer:</x-slot>{{$case->lawyers ? $case->lawyers->pluck('name')->join(', ') : 'Yet none'}}</x-show-page-tr>
                <x-show-page-tr><x-slot name="title">Client info:</x-slot>{{$case->clients ? $case->clients->pluck('name')->join(', ') : ''}}</x-show-page-tr>
                @if (auth()->user()->roles->slug != 'client')
                <tr class="border-b border-gray-300 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        {!! Form::open(['url' => '/cases/'.$case->id, 'method' => 'delete']) !!}
                        <x-button class="my-3 bg-red-500 hover:bg-red-700 active:bg-red-900">Delete case from database</x-button>
                        {!! Form::close() !!}    
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="flex item-center justify-center">
                                <x-button-link href="{{asset('cases/'.$case->id.'/edit')}}" class="my-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Edit case info</x-button-link>
                            </div>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>