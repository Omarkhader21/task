<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                @auth
                    <li>
                        <div class="flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="hover:text-blue-200 hover:underline px-4 flex items-center">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </li>
                @else
                    <li><a class="hover:text-blue-200 hover:underline px-4" href="{{ route('login') }}">Login</a></li>
                    <li><a class="hover:text-blue-200 hover:underline px-4" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            @foreach ($socialMedia as $social)
                <a class="pl-6" href="{{ $social->url }}" target="_target">
                    {!! $social->icon !!}
                </a>
            @endforeach
        </div>
    </div>
</nav>

<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-blue-700 text-5xl" href="{{ route('home') }}">
            Blogsprint
        </a>
        {{-- <p class="text-lg text-gray-600">
            Lorem Ipsum Dolor Sit Amet
        </p> --}}
    </div>
</header>

<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open">
            Topics <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div
            class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a href="{{ route('home') }}" class="hover:bg-blue-400 rounded py-2 px-4 mx-2">Home</a>
            @foreach ($categories as $category)
                <a href="{{ route('by-category', $category) }}"
                    class="hover:bg-blue-400 rounded py-2 px-4 mx-2">{{ $category->name }}</a>
            @endforeach
            <a href="{{ route('about-us') }}" class="hover:bg-blue-400 rounded py-2 px-4 mx-2">About Us</a>
        </div>
    </div>
    <!-- Search bar -->
    <div class="max-w-4xl mx-auto p-3">
        <form action="{{ route('search') }}" method="GET">
            <input placeholder="Search ....." name="search" value="{{ request()->get('search') }}"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"></input>
        </form>
    </div>
</nav>
