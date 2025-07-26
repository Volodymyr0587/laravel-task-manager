<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header>
                    <div>
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Always visible sticky footer -->
    <footer class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                <!-- Simplified footer for sticky version -->
                <div class="text-center sm:text-left">
                    <span class="text-sm font-medium text-gray-800">{{ config('app.name', 'Laravel') }}</span>
                </div>

                <div class="flex space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-xs text-gray-600 hover:text-gray-900">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('tasks.index') }}" class="text-xs text-gray-600 hover:text-gray-900">
                        {{ __('Tasks') }}
                    </a>
                    <a href="{{ route('profile.edit') }}" class="text-xs text-gray-600 hover:text-gray-900">
                        {{ __('Profile') }}
                    </a>
                </div>

                <div class="text-center sm:text-right">
                    <span class="text-xs text-gray-600">© {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </footer>

    </body>
</html>
