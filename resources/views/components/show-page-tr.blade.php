<tr {{ $attributes->merge(['class' =>'border-b border-gray-300 hover:bg-gray-100']) }}>
    <td class="py-3 px-6 text-left bg-gray-200 text-gray-600 uppercase text-sm leading-normal">{{$title}}</td>
    <td class="py-3 px-6 text-center max-w-xs">{{$slot}}</td>
</tr>