<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-3 flex items-center justify-around flex-wrap w-screen">
        <div class="w-2/5 m-2 flex flex-col items-center justify-between bg-gray-200 rounded shadow">
            <h2 class="m-3 text-center font-semibold text-3xl">Roles</h2>
            list
            <div class="w-full flex items-center justify-around">
                <x-button-link href="/admin/roles" class="m-3 bg-green-500 hover:bg-green-700 active:bg-green-900">Modify roles</x-button-link>
                <x-button-link href="/admin/roles/assign" class="m-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Assign roles</x-button-link>
            </div>
        </div>
        <div class="w-2/5 m-2 flex flex-col items-center justify-around bg-gray-200 rounded shadow">
            <h2 class="m-3 text-center font-semibold text-3xl">Permissions</h2>
            list
            <div class="w-full flex items-center justify-between">
                <x-button-link href="/admin/permissions" class="m-3 bg-green-500 hover:bg-green-700 active:bg-green-900">Modify permissions</x-button-link>
                <x-button-link href="/admin/permissions/assign" class="m-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Assign permissions</x-button-link>
            </div>
        </div>
    </div>

</x-app-layout>
