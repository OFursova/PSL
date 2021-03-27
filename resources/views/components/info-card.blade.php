<div {!! $attributes->merge(['class' => 'pt-10']) !!}>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h3 class="text-2xl text-indigo-700"> {{ $title }}</h3>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>