<x-auth-layout>
    <form class="space-y-2" method="POST" action="{{ route('register') }}">
        @csrf

        <x-text-input
            name="name"
            placeholder="Full name"
            :error="$errors->first('name')"
            value="{{ old('name') }}"
        />

        <x-text-input
            name="username"
            placeholder="Username"
            :error="$errors->first('username')"
            value="{{ old('username') }}"
        />

        <x-text-input
            name="email"
            type="email"
            placeholder="Email address"
            :error="$errors->first('email')"
            value="{{ old('email') }}"
        />

        <x-text-input
            name="password"
            type="password"
            placeholder="Password"
            :error="$errors->first('password')"
            value="{{ old('password') }}"
        />

        <x-text-input
            name="password_confirmation"
            type="password"
            placeholder="Repeat Password"
            :error="$errors->first('password_confirmation')"
            value="{{ old('password_confirmation') }}"
        />

        <div>
            <x-button type="submit">Sign Up</x-button>
        </div>
    </form>

    <x-slot:footer>
        <div class="mt-4 border border-gray-300 bg-white py-6 px-10">
            <p class="text-center text-sm text-gray-900">
                Have an account?

                <a class="text-blue-500" href="{{ route('login') }}">Log in</a>
            </p>
        </div>
    </x-slot:footer>
</x-auth-layout>
