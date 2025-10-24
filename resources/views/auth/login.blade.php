<x-guest-layout>
    <!-- Redesigned login form with minimalist styling -->
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-gray-900">Welcome back</h1>
            <p class="text-gray-600">Sign in to your LibraFlow account</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm" :status="session('status')" />

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email Address')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="email" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="password" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="w-4 h-4 border-gray-300 rounded focus:ring-blue-500 cursor-pointer" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-gray-600 cursor-pointer">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                {{ __('Sign In') }}
            </button>
        </form>

        <!-- Footer Links -->
        <div class="space-y-3 text-center text-sm">
            @if (Route::has('password.request'))
                <a class="text-blue-600 hover:text-blue-700 font-medium transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 font-medium transition-colors">
                    {{ __('Sign up') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
