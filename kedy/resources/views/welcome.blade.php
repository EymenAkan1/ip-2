<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Parki') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-gray-100">
<nav class="bg-blue-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center">
                    <i class="fas fa-parking text-white text-3xl mr-2"></i>
                    <span class="text-2xl font-bold text-white">Parki</span>
                </a>
            </div>
            <div class="flex items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-blue-700 text-white">
        <div class="max-w-7xl mx-auto py-20 px-4 sm:py-28 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl leading-tight">Find and Reserve <br>Parking Spots <br>with Ease</h1>
                <p class="mt-6 text-xl max-w-3xl">Discover nearby parking spots, make reservations, and manage your vehicles all in one place. Say goodbye to parking hassles!</p>
                <div class="mt-10">
                    <a href="{{ route('register') }}" class="inline-block bg-yellow-500 text-blue-900 font-bold py-3 px-6 rounded-lg text-lg hover:bg-yellow-400 transition duration-300">
                        <i class="fas fa-car-side mr-2"></i>Get Started
                    </a>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('images/parking-illustration.svg') }}" alt="Parking Illustration" class="w-full h-auto">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-blue-900 text-center mb-12">Why Choose Parki?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="bg-blue-50 p-8 rounded-xl shadow-md text-center">
                    <i class="fas fa-calendar-check text-5xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Easy Reservations</h3>
                    <p class="text-gray-600">Book parking spots in advance with just a few clicks.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-xl shadow-md text-center">
                    <i class="fas fa-map-marker-alt text-5xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Nearby Parking</h3>
                    <p class="text-gray-600">Find the closest available parking spots to your destination.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-xl shadow-md text-center">
                    <i class="fas fa-car text-5xl text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">Vehicle Management</h3>
                    <p class="text-gray-600">Easily manage multiple vehicles in your account.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-blue-900 text-center mb-12">How Parki Works</h2>
            <div class="flex flex-col md:flex-row justify-between items-center space-y-10 md:space-y-0 md:space-x-10">
                <div class="text-center">
                    <div class="bg-white rounded-full p-6 inline-block mb-4">
                        <i class="fas fa-search text-4xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">1. Search</h3>
                    <p class="text-gray-600">Find parking spots near your destination</p>
                </div>
                <div class="text-blue-600 text-4xl hidden md:block">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="text-center">
                    <div class="bg-white rounded-full p-6 inline-block mb-4">
                        <i class="fas fa-calendar-alt text-4xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">2. Reserve</h3>
                    <p class="text-gray-600">Book your preferred parking spot</p>
                </div>
                <div class="text-blue-600 text-4xl hidden md:block">
                    <i class="fas fa-arrow-right"></i>
                </div>
                <div class="text-center">
                    <div class="bg-white rounded-full p-6 inline-block mb-4">
                        <i class="fas fa-parking text-4xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-blue-900 mb-2">3. Park</h3>
                    <p class="text-gray-600">Enjoy hassle-free parking</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold mb-4">Ready to simplify your parking experience?</h2>
            <p class="text-xl mb-8">Join thousands of satisfied users who have made parking hassle-free.</p>
            <a href="{{ route('register') }}" class="inline-block bg-yellow-500 text-blue-900 font-bold py-3 px-6 rounded-lg text-lg hover:bg-yellow-400 transition duration-300">
                <i class="fas fa-user-plus mr-2"></i>Sign Up Now
            </a>
        </div>
    </section>
</main>

<footer class="bg-blue-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-parking mr-2"></i>
                    Parki
                </h3>
                <p class="mt-2 text-sm">© {{ date('Y') }} All rights reserved.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400">About Us</a></li>
                    <li><a href="#" class="hover:text-yellow-400">How It Works</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Pricing</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Legal</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-yellow-400">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-yellow-400">Cookie Policy</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-2xl hover:text-yellow-400"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>

