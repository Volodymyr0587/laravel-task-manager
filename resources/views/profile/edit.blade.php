<x-app-layout>
    <x-slot name="header">
        <div class="text-center my-4">
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                {{ auth()->user()->name }}
            </p>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1 bg-white shadow rounded-lg overflow-hidden">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="flex-1 bg-white shadow rounded-lg overflow-hidden">
                @include('profile.partials.update-password-form')
            </div>

            <div class="flex-1 bg-white shadow rounded-lg overflow-hidden">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
