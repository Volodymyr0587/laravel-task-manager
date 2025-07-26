<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-sm">
    <!-- Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Left: Logo + Navigation -->
            <div class="flex items-center space-x-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800">
                    {{-- Logo --}}

                </a>

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:flex">
                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">
                        {{ __('Dashboard') }}
                    </a>
                    <a href="{{ route('tasks.index') }}"
                       class="{{ request()->routeIs('tasks.index') ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">
                        {{ __('Tasks') }}
                    </a>
                </div>
            </div>

            <!-- Right: Settings -->
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 font-medium">
                    {{ Auth::user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="{{ request()->routeIs('profile.edit') ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">
                    {{ __('Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="text-red-600 hover:cursor-pointer">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
