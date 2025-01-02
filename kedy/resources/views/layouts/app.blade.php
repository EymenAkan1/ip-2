<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js for sidebar functionality -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">
<div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
    <!-- Sidebar -->
    <div class="relative flex flex-col">
        <!-- Sidebar content -->
        <div :class="{'w-64': sidebarOpen, 'w-16': !sidebarOpen}"
             class="bg-gray-800 text-white h-full transition-all duration-300 ease-in-out overflow-hidden">
            <!-- User name and avatar -->
            <div class="flex items-center space-x-4 p-2 mb-5" :class="{'justify-center': !sidebarOpen}">
                <img class="h-12 rounded-full" src="https://via.placeholder.com/50" alt="User avatar">
                <div x-show="sidebarOpen" class="transition-opacity duration-300"
                     :class="{'opacity-0': !sidebarOpen, 'opacity-100': sidebarOpen}">
                    <h4 class="font-semibold">{{ Auth::user()->name }}</h4>
                    <span class="text-xs text-gray-400">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav>
                @if(Auth::check())
                    @php
                        $role = Auth::user()->role;
                    @endphp

                    @if($role === 'admin')
                        <div class="px-3 py-2">
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Admin Panel</h3>
                            <ul class="mt-2 space-y-1">
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span x-show="sidebarOpen">Dashboard</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Analytics</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Reports</a>
                                        </li>
                                    </ul>
                                </li>
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        <span x-show="sidebarOpen">Manage Users</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('admin.users_create') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Create
                                                User</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.users_create') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Manage
                                                Roles</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @elseif($role === 'staff')
                        <div class="px-3 py-2">
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Staff Panel</h3>
                            <ul class="mt-2 space-y-1">
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span x-show="sidebarOpen">My Dashboard</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('staff.dashboard') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">My
                                                Tasks</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('staff.dashboard') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">My
                                                Schedule</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @elseif($role === 'vendor')
                        <div class="px-3 py-2">
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Vendor Panel</h3>
                            <ul class="mt-2 space-y-1">
                                <li>
                                    <a href="{{ route('vendor.dashboard') }}"
                                       class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span x-show="sidebarOpen">My Dashboard</span>
                                    </a>
                                </li>
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span x-show="sidebarOpen">Parking Lots</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('vendor.parking_lots.create') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Add
                                                New Lot</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('vendor.parking_lots.manage') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Manage
                                                Lots</a>
                                        </li>
                                    </ul>
                                </li>
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        <span x-show="sidebarOpen">Services</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('vendor.services.add') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Add
                                                New Service</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('vendor.services.manage') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">Manage
                                                Services</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @elseif($role === 'worker')
                        <div class="px-3 py-2">
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Worker Panel</h3>
                            <ul class="mt-2 space-y-1">
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span x-show="sidebarOpen">My Dashboard</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <ul x-show="open" class="mt-2 space-y-1 px-4">
                                        <li>
                                            <a href="{{ route('worker.tasks') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">My
                                                Tasks</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('worker.schedule') }}"
                                               class="block py-2 px-4 text-sm text-gray-300 hover:bg-gray-700 hover:text-white rounded">My
                                                Schedule</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @elseif($role === 'customer')
                        <div class="px-3 py-2">
                            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Customer Panel</h3>
                            <ul class="mt-2 space-y-1">
                                <li>
                                    <a href="{{ route('customer.dashboard') }}"
                                       class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span x-show="sidebarOpen">My Dashboard</span>
                                    </a>
                                </li>
                                <li x-data="{ open: false }" class="relative">
                                    <button @click="open = !open"
                                            class="flex items-center w-full py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white focus:outline-none">
                                        <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span x-show="sidebarOpen">Profile</span>
                                        <svg :class="{'rotate-180': open}" class="ml-auto h-5 w-5 transform"
                                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    @endif

                    <div class="px-3 py-2">
                        <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Account</h3>
                        <ul class="mt-2 space-y-1">
                            <li>
                                <a href="{{ route('logout') }}"
                                   class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span x-show="sidebarOpen">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </nav>
        </div>

        <!-- Toggle button -->
        <button @click="sidebarOpen = !sidebarOpen"
                class="absolute top-0 right-0 -mr-12 mt-2 h-12 w-12 rounded-full bg-gray-800 text-white flex items-center justify-center focus:outline-none">
            <svg class="h-6 w-6" x-bind:class="{'rotate-180': !sidebarOpen}" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">
                @yield('content')
            </div>
        </main>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

@yield('scripts')
</body>
</html>

