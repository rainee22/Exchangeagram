<x-auth-layout>
    <form class="space-y-2" method="POST" action="{{ route('login') }}">
        @csrf

        <x-text-input
            name="username"
            placeholder="Email address or username"
            :error="$errors->first('username')"
            value="{{ old('username') }}" 
        />

        <x-text-input
            name="password"
            type="password"
            placeholder="Password"
            :error="$errors->first('password')"
        />

        <div>
            <x-button type="submit">Log in</x-button>
        </div>
    </form>

    <x-slot:footer>
        <div class="px-10 py-6 mt-4 bg-white border border-gray-300">
            <p class="text-sm text-center text-gray-900">
                Don't have an account?

                <a class="text-blue-500" href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
    </x-slot:footer>
</x-auth-layout>
