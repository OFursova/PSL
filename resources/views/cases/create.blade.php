<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new case') }}
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
    <form method="POST" action="/cases" enctype="multipart/form-data">
        @csrf
        <!-- Case name -->
        <div>
            <x-label for="name" :value="__('Case name:')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <!-- Case slug -->
        <div>
            <x-label for="slug" :value="__('Case slug:')" />

            <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" autofocus />
        </div>

        <!-- Case description -->
        <div>
            <x-label for="description" :value="__('Case description:')" />

            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required autofocus>{{old('description')}}</x-textarea>
        </div>

        <!-- Start date -->
        <div>
            <x-label for="start" :value="__('Start date:')" />

            <x-input id="start" class="block mt-1 w-full" type="date" name="start" :value="old('start')" autofocus />
        </div>

        <!-- Select for specialization -->
        <div>
        <x-label for="spec" :value="__('Specialization:')" />
        
        <x-select id="spec" name="spec" autocomplete="specialization" :collection="$specs" :selected="null"/>
        </div>

        {{-- Select for lawyers/users --}}
        <div>
            <x-label for="lawyer" :value="__('Assign a lawyer (optional):')" />

            <x-select id="lawyer" name="lawyer" autocomplete="lawyer" :collection="$lawyers" :selected="null" autofocus />
        </div>

        <div>
            <x-label for="client" :value="__('Bind to client (optional):')" />
            
            <x-select id="client" name="client" autocomplete="client" :collection="$clients" :selected="null" autofocus />
        </div>

        {{-- Attach documents --}}
        <div>
            <x-label for="attachment" :value="__('Attachments (optional):')" />
            <x-input id="attachment" class="block mt-4 w-full" type="file" name="attachment" :value="old('attachment')" autofocus />
        </div>

        <div class="flex items-center justify-center mt-6">
        <x-button class="ml-4 bg-emerald-700 hover:bg-emerald-500 active:bg-emerald-900">
            {{ __('Register case') }}
        </x-button>
        </div>
    </form>
    </x-form>
</x-app-layout>