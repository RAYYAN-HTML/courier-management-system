<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if(request()->has('role'))
            <div class="mb-4 text-center text-lg font-bold text-blue-600">
                {{ ucfirst(request()->get('role')) }} Login
            </div>
        @else
            <div class="mb-4 text-center text-lg font-bold text-blue-600">
                Login
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if(request()->has('role'))
                <input type="hidden" name="role" value="{{ request()->get('role') }}">
            @endif

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col space-y-2 mt-6">
                @if (Route::has('register'))
                    <a class="text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Don’t have an account? Register') }}
                    </a>
                @endif

                @if (Route::has('password.request'))
                    <a class="text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="w-full">
                    {{ __('Log in') }}
                </x-button>

                <a href="{{ route('track.form') }}" class="text-center mt-4 text-yellow-500 hover:text-yellow-600 font-bold">
                    I'm a Customer → Track My Package
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>