@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Admin Dashboard</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Reservations Card -->
            <div
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div class="text-green-700">
                        <h3 class="text-4xl font-semibold">{{ $reservations->count() }}</h3>
                        <p class="text-lg">Rezervasyonlar</p>
                    </div>
                    <div class="text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.reservations_index') }}"
                   class="text-green-600 hover:text-green-800 mt-4 inline-flex items-center">
                    Detaylar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Customers Card -->
            <div
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div class="text-blue-700">
                        <h3 class="text-4xl font-semibold">{{ $customerCount }}</h3>
                        <p class="text-lg">Müşteriler</p>
                    </div>
                    <div class="text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
                <a href="{{ route('admin.users_index') }}"
                   class="text-blue-600 hover:text-blue-800 mt-4 inline-flex items-center">
                    Detaylar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Total Parking Lots Card -->
            <div
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div class="text-yellow-700">
                        <h3 class="text-4xl font-semibold">{{ $allparkinglotCount }}</h3>
                        <p class="text-lg">Toplam Otopark</p>
                    </div>
                    <div class="text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
                <a href="#" class="text-yellow-600 hover:text-yellow-800 mt-4 inline-flex items-center">
                    Detaylar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Active Parking Lots Card -->
            <div
                class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div class="text-purple-700">
                        <h3 class="text-4xl font-semibold">{{ $openparkinglotCount }}</h3>
                        <p class="text-lg">Aktif Otopark</p>
                    </div>
                    <div class="text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <a href="#" class="text-purple-600 hover:text-purple-800 mt-4 inline-flex items-center">
                    Detaylar
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Chart and Statistics -->
        <div class="mt-12">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-green-800">Son 7 Günlük Rezervasyon İstatistikleri</h2>
                <div class="mt-6">
                    <canvas id="reservationChart" class="w-full h-64"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Access Boxes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
            <!-- Users Box -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <h2 class="text-xl font-semibold text-green-800">Kullanıcılar</h2>
                <p class="mt-2 text-gray-600">Sistemdeki tüm kullanıcıları görüntüle ve yönet.</p>
                <a href="{{ route('admin.users_index') }}"
                   class="mt-4 inline-flex items-center text-green-600 hover:text-green-800">
                    Devamını Gör
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <!-- Reservations Box -->
            <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <h2 class="text-xl font-semibold text-green-800">Rezervasyonlar</h2>
                <p class="mt-2 text-gray-600">Tüm rezervasyon kayıtlarını görüntüleyin.</p>
                <a href="{{ route('admin.reservations_index') }}"
                   class="mt-4 inline-flex items-center text-green-600 hover:text-green-800">
                    Devamını Gör
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Sample data for the chart
            const ctx = document.getElementById('reservationChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['7 gün önce', '6 gün önce', '5 gün önce', '4 gün önce', '3 gün önce', '2 gün önce', 'Dün'],
                    datasets: [{
                        label: 'Rezervasyonlar',
                        data: [12, 19, 3, 5, 2, 3, 7],
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection

