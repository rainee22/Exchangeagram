<x-app-layout>
    <div class="flex space-x-4">
        <div class="w-3/5">
            <x-user-stories />
            <livewire:post-collection />
        </div>

        <aside class="w-full h-auto px-4">
            <livewire:recommended-users />
        </aside>
    </div>
</x-app-layout>
