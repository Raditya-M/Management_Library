<x-guest-layout>
    <!-- Redesigned forgot password form with minimalist styling -->
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-gray-900">Reset password</h1>
            <p class="text-gray-600">Enter your email to receive a password reset link</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm" :status="session('status')" />

        <!-- Reset Form -->
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email Address')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="email" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                {{ __('Send Reset Link') }}
            </button>
        </form>

        <!-- Back Link -->
        <div class="text-center text-sm">
            <a class="text-blue-600 hover:text-blue-700 font-medium transition-colors" href="{{ route('login') }}">
                {{ __('Back to login') }}
            </a>
        </div>
    </div>
</x-guest-layout>
