<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __('Specializations') }}
            </h2>

            <form action="/api/specs?api_token={{Auth::user()->api_token}}" method="POST" class="flex items-center justify-between flex-wrap">
                @csrf
            <x-input class="block mt-1 w-30 mx-3" type="text" name="name" :value="old('name')" autofocus />
            <x-button class="my-1 mr-4 self-end bg-green-500 hover:bg-green-700">
                {{ __('Add specialization') }}
            </x-button>
            </form>
        </div>
    </x-slot>
    
    <div class="py-2 max-w-7xl w-full mx-auto sm:px-6 lg:px-8 my-6">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                  <tr class="bg-gray-200 text-gray-600 uppercase text-md md:text-sm sm:text-xs leading-normal">
                    <th class="py-3 px-6 text-center">ID</th>
                    <th class="py-3 px-6 text-center">Name</th>
                    <th class="py-3 px-6 text-center">Slug</th>
                    <th class="py-3 px-6 text-center" colspan="3"></th>
                  </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($specs as $spec)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{$spec->id}}</td>
                    <td class="py-3 px-6 text-center"><p class="font-semibold my-2">{{ucwords($spec->name)}}</p></td>
                    <td class="py-3 px-6 text-center">{{$spec->slug}}</td>
                    <td class="py-3 px-6 text-center">
                        <form action="/api/specs/{{$spec->id}}?api_token={{Auth::user()->api_token}}" method="POST" class="flex items-center justify-between flex-nowrap">
                            <input type="hidden" name="_method" value="put">
                            @csrf
                            <x-input class="block mt-1 w-30 mx-3" type="text" name="name" :value="old('name')" autofocus />
                            <x-button class="my-1 mr-4 self-end bg-yellow-500 hover:bg-yellow-700">
                                {{ __('Edit') }}
                            </x-button>
                        </form>
                    </td>
                    <td class="py-3 px-6 text-center">
                        {!! Form::open(['url' => '/api/specs/'.$spec->id.'?api_token='.Auth::user()->api_token, 'method' => 'delete']) !!}
                        <x-button class="m-3 text-center bg-red-500 hover:bg-red-700 active:bg-red-900">Delete</x-button>
                        {!! Form::close() !!}
                    </td>
                    <td class="py-3 px-6 text-center">
                    <x-button-link href="/admin/specs/assign" class="m-3 bg-blue-500 hover:bg-blue-700 active:bg-blue-900">Assign</x-button-link>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    </div>
</x-app-layout>
