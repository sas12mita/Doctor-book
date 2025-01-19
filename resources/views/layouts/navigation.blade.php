<nav x-data="{ open: false }" class="w-full">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="background-color:blue">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo on the left -->
                <div class="shrink-0 flex items-center">
                    <a href="#">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>
            </div>

            <!-- Navigation Links on the right -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">
                <x-nav-link href="#" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="#" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('About Us') }}
                </x-nav-link>
                <x-nav-link href="#" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Contact Us') }}
                </x-nav-link>
                <x-nav-link href="{{route('viewdoctors')}}" :active="request()->routeIs('viewdoctors')" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Doctors') }}
                </x-nav-link>
                <x-nav-link href="#" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Services') }}
                </x-nav-link>
                @guest
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Login') }}
                </x-nav-link>
                <x-nav-link :href="route('register')" :active="request()->routeIs('signup')" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Signup') }}
                </x-nav-link>
                @endguest
                @auth
                <x-nav-link href="{{ route('profile.edit') }}" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                    {{ __('Profile') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-nav-link href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
                        {{ __('Logout') }}
                    </x-nav-link>
                </form>
                @endauth
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                {{ __('About Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                {{ __('Doctors') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                {{ __('Services') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="#" class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="#">
                    @csrf
                    <x-responsive-nav-link href="#"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="block py-2 px-4 rounded hover:bg-blue-600 hover:text-white text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth

        @guest
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
            {{ __('Login') }}
        </x-nav-link>
        <x-nav-link :href="route('register')" :active="request()->routeIs('signup')" class="hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-white">
            {{ __('Signup') }}
        </x-nav-link>
        @endguest
    </div>
</nav>