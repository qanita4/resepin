<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" class="text-sm font-semibold text-slate-700" />
            <x-text-input
                id="email"
                class="block w-full rounded-xl border border-resepin-tomato/20 bg-white/90 px-4 py-3 text-base text-slate-800 shadow-sm transition focus:border-resepin-tomato focus:ring-2 focus:ring-resepin-tomato/40"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <x-input-label for="password" :value="__('Password')" class="text-sm font-semibold text-slate-700" />

            <x-text-input
                id="password"
                class="block w-full rounded-xl border border-resepin-tomato/20 bg-white/90 px-4 py-3 text-base text-slate-800 shadow-sm transition focus:border-resepin-tomato focus:ring-2 focus:ring-resepin-tomato/40"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input id="remember_me" type="checkbox" class="rounded-md border-resepin-tomato/30 text-resepin-tomato shadow-sm focus:ring-resepin-tomato/60" name="remember">
                <span class="text-slate-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="font-medium text-resepin-tomato transition hover:text-resepin-tomato/80 focus:outline-none focus:ring-2 focus:ring-resepin-tomato/40 focus:ring-offset-2 focus:ring-offset-white rounded-md px-1" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex flex-col gap-4 pt-2 text-sm">
            <x-primary-button class="w-full justify-center gap-2 rounded-xl px-5 py-3 text-base">
                {{ __('Log in') }}
            </x-primary-button>
            <p class="text-center text-slate-600">
                {{ __('Don\'t have an account?') }}
                <a class="font-semibold text-resepin-tomato transition hover:text-resepin-tomato/80" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
