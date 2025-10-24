<section class="space-y-6">
    <!-- Header -->
    <div class="space-y-2">
        <h3 class="text-lg font-semibold text-gray-900">
            {{ __('Delete Account') }}
        </h3>
        <p class="text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <!-- Delete Button -->
    <div>
        <button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="p-6 space-y-6">
            <!-- Modal Header -->
            <div class="space-y-2">
                <h2 class="text-lg font-semibold text-gray-900">
                    {{ __('Delete Account') }}
                </h2>
                <p class="text-sm text-gray-600">
                    {{ __('Are you sure you want to delete your account? This action cannot be undone. All your data will be permanently deleted.') }}
                </p>
            </div>

            <!-- Password Confirmation -->
            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-900">
                        {{ __('Password') }}
                    </label>
                    <input id="password" name="password" type="password" 
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                        placeholder="{{ __('Enter your password to confirm') }}" />
                    @error('password', 'userDeletion')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Modal Actions -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-200">
                    <button x-on:click="$dispatch('close')" type="button"
                            class="px-4 py-2 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition-colors">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</section>
