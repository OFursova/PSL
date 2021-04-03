<select {{ $attributes->merge(['class' => 'mt-1 block w-40 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    <option hidden>Filter by:</option>
    <option value="spec">Specialization</option>
    <option value="lawyer">Lawyer</option>
    <option value="client">Client</option>
    <option value="result">Result</option>
</select>