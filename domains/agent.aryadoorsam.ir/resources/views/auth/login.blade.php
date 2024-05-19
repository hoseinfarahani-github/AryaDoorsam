<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @CSRF

        <!-- Email Address -->
        <div>
            <x-input-label class="rtl" for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full rtl" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="rtl" for="password" :value="__('رمز عبور')" />

            <x-text-input id="password" class="block mt-1 w-full rtl"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 rtl" />
        </div>

        @include('captcha.index')

        <!-- Remember Me -->
        <div class="block mt-4 rtl">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="mr-2 text-sm text-gray-600 dark:text-gray-400 rtl">{{ __('مرا به خاطر بسپر') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class=" text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 rtl" href="{{ route('password.request') }}">
                    {{ __('فراموشی رمز عبور') }}
                </a>
            @endif

            <x-primary-button class="ml-3 rtl">
                {{ __('ورود') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
