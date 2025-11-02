<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-slate-700" />
            <x-text-input
                id="name"
                class="block w-full rounded-xl border border-resepin-tomato/20 bg-white/90 px-4 py-3 text-base text-slate-800 shadow-sm transition focus:border-resepin-tomato focus:ring-2 focus:ring-resepin-tomato/40"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

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
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-semibold text-slate-700" />

            <x-text-input
                id="password_confirmation"
                class="block w-full rounded-xl border border-resepin-tomato/20 bg-white/90 px-4 py-3 text-base text-slate-800 shadow-sm transition focus:border-resepin-tomato focus:ring-2 focus:ring-resepin-tomato/40"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4 pt-2 text-sm">
            <x-primary-button class="w-full justify-center gap-2 rounded-xl px-5 py-3 text-base">
                {{ __('Register') }}
            </x-primary-button>
            <p class="text-center text-slate-600">
                {{ __('Already registered?') }}
                <a class="font-semibold text-resepin-tomato transition hover:text-resepin-tomato/80" href="{{ route('login') }}">
                    {{ __('Log in') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
