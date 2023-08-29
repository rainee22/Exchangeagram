@props([
    'type' => 'text',
    'variant' => 'primary',
    'colors' => [
        'primary' => 'bg-blue-500 text-white hover:bg-blue-600',
        'danger' => 'bg-red-500 text-white hover:bg-red-600',
    ],
])

<button type="{{ $type }}"
    {{ $attributes->class(['w-full rounded-md py-1.5 px-2 text-sm', $colors[$variant]]) }}>{{ $slot }}</button>
