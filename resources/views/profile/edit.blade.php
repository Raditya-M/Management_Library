<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <!-- Redesigned profile page with minimalist white-mode aesthetic -->
    <div class="p-8">
        <div class="max-w-2xl mx-auto space-y-6">
            <!-- Profile Information Card -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Update Password Card -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
                @include('profile.partials.update-password-form')
            </div>

            <!-- Delete Account Card -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
