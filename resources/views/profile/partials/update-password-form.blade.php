<section class="max-w-md mx-auto p-4 border rounded">
    <header class="text-center my-4">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">{{ __('Update Password') }}</h2>
        <p class="text-sm text-gray-600 mt-2">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-4">
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">{{__('Current Password')}}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-sm font-bold text-red-500 mt-2" />
        </div>

        <div class="mb-4">
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">{{__('New Password')}}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-sm font-bold text-red-500 mt-2" />
        </div>

        <div class="mb-4">
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">{{__('Confirm Password')}}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-sm font-bold text-red-500 mt-2" />
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
