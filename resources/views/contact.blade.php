<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
        <x-button-link href="{{asset('/home')}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <p class="p-3 text-justify">
                Give us brief information about your case or just describe a situation.
            </p>
        </div>
    <x-form>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <!-- Form -->
    <form method="POST" action="/contact" enctype="multipart/form-data" class="flex flex-col items-stretch justify-start">
        @csrf 
        <input type="hidden" name="role_id" value="3">
        <div>
            <x-label for="name" :value="__('Your name:')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth()->user()->name" required autofocus />
        </div>
        <div>
            <x-label for="email" :value="__('Email:')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="auth()->user()->email" required autofocus />
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
            <x-label for="caseName" :value="__('Case info:')" />
            <x-input id="caseName" class="block mt-1 w-full" type="text" name="caseName" :value="old('caseName')" placeholder="Mr. White vs Mr. Black on issue" required autofocus />
        </div>
        <div>
            <x-label for="description" :value="__('Case description:')" />

            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required autofocus>
                {{old('description')}}
            </x-textarea>
        </div>
        <div>
            <x-label for="spec" :value="__('Specialization:')" />
            <x-select id="spec" name="spec" autocomplete="specialization" :collection="$specs" :selected="null" autofocus />
        </div>
        <div>
            <x-label for="attachment" :value="__('You can add text file or archive to provide more details about your case:')" />
            <x-input id="attachment" class="block mt-4 w-full" type="file" name="attachment" :value="old('attachment')" autofocus />
        </div>
        <div class="flex items-center justify-center mt-6">
        <x-button class="ml-4 bg-emerald-700 hover:bg-emerald-500 active:bg-emerald-900">
            {{ __('Send application') }}
        </x-button>
        </div>
        </div>
    </form>
    </x-form>
    
    </div>
</x-app-layout>