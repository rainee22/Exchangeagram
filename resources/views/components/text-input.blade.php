@props(['type' => 'text', 'error' => ''])

<div>
    <input type="{{ $type }}" {{ $attributes->class(['w-full border border-gray-200 bg-gray-50 px-3 py-2 text-sm focus:border-gray-300 focus:outline-none']) }}>

    @if ($error)
        <span class="text-xs text-red-500">{{ $error }}</span>
    @endif
</div>