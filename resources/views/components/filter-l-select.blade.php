<select {{ $attributes->merge(['class' => 'mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    <option hidden>Filter by:</option>
    <option value="name">Name</option>
    <option value="spec">Specialization</option>
    <option value="case">Case</option>
    <option value="position">Position</option>
</select>