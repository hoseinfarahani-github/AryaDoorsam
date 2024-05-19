<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('رمز عبور خود را فراموش کردید؟ایمیل خود را وارد کرده تا لینک بازیابی رمزعبور برای شما ارسال شود') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="rtl" for="email" :value="__('ایمیل')" />
            <x-text-input id="email" class="block mt-1 w-full rtl" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('بازیابی رمزعبور') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
