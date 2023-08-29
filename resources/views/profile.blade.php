<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center px-12 py-5">
            <img class="block w-32 h-32 rounded-full shadow-sm" src="{{ $user->avatar }}" />

            <div class="ml-12 w-[300px] space-y-4">
                <div class="flex items-center space-x-6">
                    <p>{{ $user->username }}</p>

                    @if (auth()->user()->isNot($user))
                        <livewire:follow-button :user="$user" />
                    @endif
                </div>

                <div class="flex justify-between">
                    <p class="text-sm text-gray-600">
                        <strong class="font-semibold text-gray-800">
                            {{ $user->posts->count() }}
                        </strong>
                        posts
                    </p>

                    <p class="text-sm text-gray-600">
                        <strong class="font-semibold text-gray-800">
                            {{ $user->follows->count() }}
                        </strong>
                        followers
                    </p>

                    <p class="text-sm text-gray-600">
                        <strong class="font-semibold text-gray-800">
                            {{ $user->following->count() }}
                        </strong>
                        following
                    </p>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $user->name }}
                    </p>

                    <p class="mt-1 text-sm leading-tight text-gray-600">
                        lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                    </p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200">
            <nav class="flex justify-center -mb-px space-x-12" aria-label="Tabs">
                <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                <a class="-mt-px border-t-[1.5px] border-gray-500 px-1 py-2.5 text-sm font-medium text-gray-600"
                    href="#">Posts</a>
                <a class="-mt-px whitespace-nowrap border-t-[1.5px] border-transparent px-1 py-2.5 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    href="#">Saved</a>
                <a class="-mt-px whitespace-nowrap border-t-[1.5px] border-transparent px-1 py-2.5 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    href="#">Tagged</a>
            </nav>

            <div class="w-full h-auto mt-4">
                <ul class="grid grid-cols-2 gap-2 sm:grid-cols-3"
                    role="list">

                    @foreach($user->posts as $post)
                        <li class="relative">
                            <div
                                class="block w-full overflow-hidden bg-gray-100 aspect-square group focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <img class="object-cover object-center w-full h-full pointer-events-none group-hover:opacity-75"
                                    src="{{ $post->photo }}"
                                    alt="">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
