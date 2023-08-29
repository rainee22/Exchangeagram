<div class="px-3 py-2 bg-white border border-gray-300">
    <ul class="flex w-full space-x-3 overflow-x-auto overflow-y-hidden scrollbar-hide">
        @foreach (range(1, 10) as $n)
            <li
                class="flex h-14 w-14 flex-none rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[3px]">
                <img class="h-full w-full rounded-full bg-white p-[3px]"
                    src="{{ 'https://i.pravatar.cc/300?u=' . Str::random(12) . '-' . $n }}"
                    alt="{{ $n }}">
            </li>
        @endforeach
    </ul>
</div>
