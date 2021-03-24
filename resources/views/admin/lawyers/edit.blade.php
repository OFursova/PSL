<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit case') }}
        </h2>
        <x-button-link href="cases/{{$case->id}}" class="ml-4 self-end bg-gray-500 hover:bg-gray-700 active:bg-gray-900">
            {{ __('Back') }}
        </x-button-link>
        </div>
    </x-slot>
    <x-form>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <!-- Form -->
    {{-- {!! Form::model($case, ['url' => '/cases/'.$case->id, 'method' => 'put']) !!} --}}
   
    <form method="POST" action="/cases/{{$case->id}}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <!-- Case name -->
        <div>
            <x-label for="name" :value="__('Case name')" />
            
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$case->name" required autofocus />
        </div>
            
        <!-- Case slug -->
        <div>
            <x-label for="slug" :value="__('Case slug')" />
                
            <x-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="$case->slug" required autofocus />
        </div>
                
        <!-- Case description -->
        <div>
            <x-label for="description" :value="__('Case description')" />

            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required autofocus>
                    {{$case->description}}
            </x-textarea>
        </div>

        <!-- Start and end dates -->
        <div class="flex items-center justify-between my-4">
                <x-label for="start" class="whitespace-nowrap mx-2" :value="__('Start date')" />

                <x-input id="start" class="block w-1/3" type="date" name="start" :value="$case->start" autofocus />

                <x-label for="end" class="whitespace-nowrap mx-2" :value="__('Case solved')" />
                
                <x-input id="end" class="block w-1/3" type="date" name="end" :value="$case->end" autofocus />
        </div>
        
        <!-- Result -->
        <div class="flex items-center justify-start my-4">
            <x-label for="won" class="mx-2" value="Won" />
            <x-input id="won" class="w-5" type="radio" name="result" value="1"/>
            <x-label for="lost" class="mx-2" value="Lost" />
            <x-input id="lost" class="w-5" type="radio" name="result" value="0"/>
        </div>
        
        {{-- Select for lawyers/users --}}

        <!-- Select for specialization -->
        <div>
            <x-label for="spec" :value="__('Specialization:')" />

            <x-select id="spec" name="spec" autocomplete="specialization" :collection="$specs" :selected="$case->specs->pluck('name')->join(',')"/>
        </div>

        <!-- Attach documents -->

        <div class="flex items-center justify-center mt-6">
            <x-button class="ml-4 ">
                {{ __('Save changes') }}
            </x-button>
        </div>
    </form>
    {{-- {!! Form::close() !!} --}}
    </x-form>
</x-app-layout>