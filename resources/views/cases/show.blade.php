<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Case info') }}
        </h2>
        <x-button-link href="/cases" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>

    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
        <table class="table-auto min-w-max w-full bg-white shadow-md rounded">
            <tbody class="text-gray-600 text-sm font-light">
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Case title</td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">{{$case->name}}</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Specialization</td>
                            <td class="py-3 px-6 text-center max-w-xs">{{$case->specs ? $case->specs->pluck('name')->join(',') : ''}}</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Description</td>
                            <td class="py-3 px-6 text-center max-w-xs">{{$case->description}}</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Started</td>
                            <td class="py-3 px-6 text-center">{{$case->start ? $case->start : 'not started yet'}}</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Ended</td>
                            <td class="py-3 px-6 text-center">{{$case->end ? $case->end : 'in progress'}}</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Result</td>
                            <td class="py-3 px-6 text-center">
                                @if ($case->result === 1) <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Won</span>
                                @elseif ($case->result === 0) <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Lost</span>
                                @else -
                                @endif
                            </td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Leading lawyer</td>
                            <td class="py-3 px-6 text-center">Unset</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">Client info</td>
                            <td class="py-3 px-6 text-center">Unset</td>
                        </tr>
                        <tr class="border-b border-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                {!! Form::open(['url' => '/cases/'.$case->id, 'method' => 'delete']) !!}
                                <x-button class="my-3 bg-red-500 hover:bg-red-700 active:bg-red-900">Delete case from database</x-button>
                                {!! Form::close() !!}    
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="flex item-center justify-center">
                                        <x-button-link href="/cases/{{$case->id}}/edit" class="my-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Edit case info</x-button-link>
                                    </div>
                                </div>
                            </td>
                        </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>