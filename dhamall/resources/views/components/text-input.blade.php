@props(['name' => '', 'type' => 'text', 'value' => '', 'required' => false, 'autocomplete' => 'off'])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $name }}"
    value="{{ $value }}"
    {{ $required ? 'required' : '' }}
    autocomplete="{{ $autocomplete }}"
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full']) }}
>
