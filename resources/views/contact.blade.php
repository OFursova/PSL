<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
        <x-button-link href="{{asset('admin/lawyers')}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Lawyers') }}
        </x-button-link>
        </div>
    </x-slot>
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <p class="p-3 text-justify">
                If you need legal help of any kind, fill the following form and our assosiates will contact you within an hour.
            </p>
        </div>
    <x-form>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <!-- Form -->
    <form method="POST" action="/contact" enctype="multipart/form-data" class="flex flex-col items-center justify-start">
        @csrf
        <input type="hidden" name="role_id" value="3">
        <div>
            <x-label for="name" :value="__('Your name:')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        <div>
            <x-label for="email" :value="__('Email:')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>
        <div>
            <x-label for="phone" :value="__('Contact phone:')" />
            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autofocus />
        </div>
        <div>
            <x-label for="address" :value="__('Post address:')" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" autofocus />
        </div>
        <div>
            <x-label for="spec" :value="__('Specialization:')" />
            <x-select id="spec" name="spec" autocomplete="specialization" :collection="$specs" :selected="null" />
        </div>

        {{-- Select for cases --}}
        <div>
            <x-label for="cases" :value="__('Case info:')" />
            {{-- <x-select id="cases" name="cases" autocomplete="cases" :collection="$cases" :selected="null" /> --}}
            <x-input type="text"></x-input>
        </div>

        <div class="flex items-center justify-center mt-6">
        <x-button class="ml-4 bg-emerald-700 hover:bg-emerald-500 active:bg-emerald-900">
            {{ __('Contact') }}
        </x-button>
        </div>
        </div>
    </form>
    </x-form>
    
    </div>
</x-app-layout>