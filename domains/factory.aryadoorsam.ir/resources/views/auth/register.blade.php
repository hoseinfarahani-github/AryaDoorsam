
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label class="rtl" for="name" :value="__('نام کاربری')" />
            <x-text-input id="name"  class="block mt-1 w-full rtl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="rtl" for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full rtl" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="rtl" for="password" :value="__('رمزعبور')" />

            <x-text-input id="password" class="block mt-1 w-full rtl"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="rtl" for="password_confirmation" :value="__('تکرار رمزعبور')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full trl"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 rtl" href="{{ route('login') }}">
                {{ __('عضو سایت هستید؟') }}
            </a>

            <x-primary-button class="ml-4 rtl">
                {{ __('عضویت') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
