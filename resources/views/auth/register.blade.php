<x-guest-layout>
    <!-- Redesigned register form with minimalist styling -->
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center space-y-2">
            <h1 class="text-2xl font-bold text-gray-900">Create account</h1>
            <p class="text-gray-600">Join LibraFlow to manage your library</p>
        </div>

        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div class="space-y-2">
                <x-input-label for="name" :value="__('Full Name')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="name" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Email Address -->
            <div class="space-y-2">
                <x-input-label for="email" :value="__('Email Address')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="email" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Password -->
            <div class="space-y-2">
                <x-input-label for="password" :value="__('Password')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="password" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="space-y-2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-900" />
                <x-text-input id="password_confirmation" class="block w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Role Selection -->
            <div class="space-y-3">
                <label class="text-sm font-medium text-gray-900">{{ __('Register as') }}</label>
                <div class="grid grid-cols-2 gap-3">
                    <!-- Student Option -->
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="siswa" class="peer hidden"
                            {{ old('role', 'siswa') == 'siswa' ? 'checked' : '' }}>
                        <div class="border border-gray-200 rounded-lg p-3 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-300 transition-all">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600"></div>
                                <span class="font-medium text-gray-900">Student</span>
                            </div>
                        </div>
                    </label>

                    <!-- Admin Option -->
                    <label class="cursor-pointer">
                        <input type="radio" name="role" value="admin" class="peer hidden"
                            {{ old('role') == 'admin' ? 'checked' : '' }}>
                        <div class="border border-gray-200 rounded-lg p-3 peer-checked:border-blue-600 peer-checked:bg-blue-50 hover:border-gray-300 transition-all">
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded-full border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600"></div>
                                <span class="font-medium text-gray-900">Admin</span>
                            </div>
                        </div>
                    </label>
                </div>
                <x-input-error :messages="$errors->get('role')" class="text-red-600 text-sm mt-1" />
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                {{ __('Create Account') }}
            </button>
        </form>

        <!-- Footer Link -->
        <div class="text-center text-sm text-gray-600">
            Already have an account?
            <a class="text-blue-600 hover:text-blue-700 font-medium transition-colors" href="{{ route('login') }}">
                {{ __('Sign in') }}
            </a>
        </div>
    </div>
</x-guest-layout>
