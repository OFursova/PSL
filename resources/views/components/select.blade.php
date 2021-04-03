@props(['collection', 'selected'])

<select {{ $attributes->merge(['class' => 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    <option hidden></option>
    @foreach ($collection as $key => $item)
    <option {{$selected == $item ? 'selected' : ''}} value="{{$key}}">{{$item}}</option>
    @endforeach
</select>