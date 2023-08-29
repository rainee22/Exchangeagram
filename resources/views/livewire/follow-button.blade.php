<div>
    @if (!auth()->user()->isFollowing($user))
        <x-button class="h-8 !w-20" wire:click="$emit('follow')">Follow</x-button>
    @else
        <x-button class="h-8 !w-20" variant="danger" wire:click="$emit('unFollow')">Unfollow</x-button>
    @endif
</div>
