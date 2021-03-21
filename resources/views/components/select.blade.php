@props(['collection', 'selected'])

<select {{ $attributes->merge(['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    @foreach ($collection as $item)
    <option {{$selected == $item ? 'selected' : ''}}>{{$item}}</option>
    @endforeach
</select>