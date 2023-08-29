@props(['users' => []])

<div>
    <div class="flex items-center justify-between">
        <h4 class="text-sm font-medium text-gray-400">Suggestions for you</h4>
        <a class="text-sm font-medium text-gray-900" href="#">See all</a>
    </div>

    <nav class="mt-4">
        <ul class="flex flex-col space-y-3">
            @foreach ($users as $user)
                <li>
                    <div class="flex items-center justify-between">
                        <a href="/u/{{ $user->username }}" class="flex space-x-3.5">
                            <div class="flex flex-none w-10 h-10 rounded-full">
                                <img class="w-full h-full rounded-full" src="{{ $user->avatar }}"
                                    alt="{{ $user->name }}">
                            </div>

                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $user->username }}</p>
                                <p class="text-sm text-gray-400">Followed by {{ $user->follows_count }}
                                    people</p>
                            </div>
                        </a>

                        <div>
                            @if (!auth()->user()->isFollowing($user))
                                <button class="text-sm font-medium text-blue-500" type="button"
                                    wire:click="$emit('follow', '{{ $user->id }}')">Follow</button>
                            @else
                                <button class="text-sm font-medium text-red-500" type="button"
                                    wire:click="$emit('unFollow', '{{ $user->id }}')">
                                    Unfollow</button>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
