<section class="max-w-md mx-auto p-4 border border-red-300 rounded bg-red-50">
    <header class="text-center my-4">
        <h2 class="text-2xl font-semibold text-red-800 leading-tight">{{ __('Delete Account') }}</h2>

        <p class="text-sm text-red-700 mt-2">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
            <input id="password" name="password" type="password" placeholder="{{ __('Password') }}"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2"/>
            <x-input-error :messages="$errors->userDeletion->get('password')" class="text-sm font-bold text-red-500 mt-2" />
        </div>

        <div class="text-center">
            <button type="submit"
                onclick="return confirm('{{ __('Are you sure you want to delete your account?') }}')"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 font-medium">
                {{ __('Delete Account') }}
            </button>
        </div>
    </form>

</section>
