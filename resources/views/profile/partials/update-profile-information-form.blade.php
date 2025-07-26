<section class="max-w-md mx-auto p-4 border rounded">
    <header class="text-center my-4">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">{{ __('Profile Information') }}</h2>

        <p class="text-sm text-gray-600 mt-2">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">{{__('Name')}}</label>
            <input id="name" name="name" type="text" value="{{old('name', $user->name)}}" required autofocus autocomplete="name"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
            <x-input-error class="text-sm font-bold text-red-500 mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">{{__('Email')}}</label>
            <input id="email" name="email" type="email" value="{{old('email', $user->email)}}" required autocomplete="username"
                class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" />
            <x-input-error class="text-sm font-bold text-red-500 mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded">
                    <p class="text-sm text-yellow-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-blue-600 hover:text-blue-800 underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-sm text-green-600 mt-2">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-green-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
