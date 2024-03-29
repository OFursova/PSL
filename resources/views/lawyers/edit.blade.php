<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit my profile') }}
        </h2>
        <x-button-link href="{{url()->previous()}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>
    <x-form>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <!-- Form -->
    <form method="POST" action="/lawyers/{{$lawyer->id}}" enctype="multipart/form-data" class="flex items-center justify-between">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <input name="id" type="hidden" value="{{$lawyer->id}}">
        <div class="w-1/3 flex flex-col items-center justify-start p-3 self-start">
        <!-- Avatar -->
            <x-label for="avatar" :value="__('Avatar:')" class="self-start" />
            <img src="{{asset($lawyer->avatar)}}" alt="{{$lawyer->name}}" class="w-3/4 border">
            <x-input id="avatar" class="block mt-4 w-full" type="file" name="avatar" :value="$lawyer->avatar" autofocus />
        </div>
        <div class="w-2/3 p-3">
            <input type="hidden" name="role_id" value="2">
        <!-- Lawyer's full name -->
        <div>
            <x-label for="name" :value="__('Full name:')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$lawyer->name" required autofocus />
        </div>

        <!-- Password -->
        <div>
            <x-label for="password" :value="__('Password:')" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" autofocus />
        </div>
        
        <!-- Email -->
        <div>
            <x-label for="email" :value="__('Email:')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$lawyer->email" required autofocus />
        </div>

        <!-- Phone -->
        <div>
            <x-label for="phone" :value="__('Contact phone:')" />
            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$lawyer->phone" autofocus />
        </div>

        <!-- Address -->
        <div>
            <x-label for="address" :value="__('Post address:')" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$lawyer->address" autofocus />
        </div>

        <!-- Select for position -->
        <div>
            <x-label for="position" :value="__('Position:')" />
            <x-select id="position" name="position_id" autocomplete="position" :collection="$positions" :selected="$lawyer->position->name ?? null" />
        </div>

        <!-- Select for specialization -->
        <div>
            <x-label for="spec" :value="__('Specialization:')" />
            <x-select id="spec" name="spec" autocomplete="specialization" :collection="$specs" :selected="$lawyer->specs ? $lawyer->specs->pluck('name')->first() : null" />
        </div>

        {{-- Select for cases --}}
        <div>
            <x-label for="case" :value="__('Assign cases:')" />
            <x-select id="case" name="case" autocomplete="case" :collection="$cases" :selected="$lawyer->cases ? $lawyer->cases->pluck('name')->first() : null" />
        </div>

        <div class="flex items-center justify-center mt-6">
        <x-button class="ml-4 bg-emerald-700 hover:bg-emerald-500 active:bg-emerald-900">
            {{ __('Save changes') }}
        </x-button>
        </div>
        </div>
    </form>
    </x-form>
</x-app-layout>