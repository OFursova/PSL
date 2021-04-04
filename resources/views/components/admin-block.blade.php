<div {{ $attributes->merge(['class' => 'w-2/5 m-2 flex flex-col items-center justify-between bg-gray-200 rounded shadow']) }}>
    <h2 class="m-3 text-center font-semibold text-3xl">{{$title}}</h2>
    {{ $slot }}
    <div class="w-full flex items-center justify-around">
        <x-button-link href="/admin/{{$action}}" class="m-3 bg-green-500 hover:bg-green-700 active:bg-green-900">Modify {{$action}}</x-button-link>
        <x-button-link href="/admin/{{$action}}/assign" class="m-3 bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900">Assign {{$action}}</x-button-link>
    </div>
</div>