@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Admin Dashboard</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $dashboardItems = [
                    ['title' => 'Rezervasyonlar', 'count' => $reservations->count(), 'icon' => 'calendar', 'color' => 'green', 'route' => 'admin.reservations_index'],
                    ['title' => 'Kullanıcı sayısı', 'count' => $userCount, 'icon' => 'users', 'color' => 'blue', 'route' => 'admin.users_index'],
                    ['title' => 'Müşteri Sayısı', 'count' => $customerCount, 'icon' => 'users', 'color' => 'blue', 'route' => 'admin.customers_index'],
                    ['title' => 'Toplam Otopark', 'count' => $allparkinglotCount, 'icon' => 'parking', 'color' => 'yellow', 'route' => 'admin.all_parking_lots_index'],
                    ['title' => 'Aktif Otopark', 'count' => $openparkinglotCount, 'icon' => 'check-circle', 'color' => 'purple', 'route' => 'admin.available_parking_lots_index'],
                ];
            @endphp

            @foreach ($dashboardItems as $item)
                <div
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 border-l-4 border-{{ $item['color'] }}-500">
                    <div class="flex items-center justify-between">
                        <div class="text-{{ $item['color'] }}-700">
                            <h3 class="text-4xl font-semibold">{{ $item['count'] }}</h3>
                            <p class="text-lg">{{ $item['title'] }}</p>
                        </div>
                        <div class="text-{{ $item['color'] }}-500">
                            @include('components.icons.' . $item['icon'], ['class' => 'h-12 w-12'])
                        </div>
                    </div>
                    <a href="{{ route($item['route']) }}"
                       class="text-{{ $item['color'] }}-600 hover:text-{{ $item['color'] }}-800 mt-4 inline-flex items-center">
                        Detaylar
                        @include('components.icons.chevron-right', ['class' => 'h-5 w-5 ml-1'])
                    </a>
                </div>
            @endforeach
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
            @php
                $quickAccessItems = [
                    ['title' => 'Kullanıcılar', 'description' => 'Sistemdeki tüm kullanıcıları görüntüle ve yönet.', 'route' => 'admin.users_index'],
                    ['title' => 'Rezervasyonlar', 'description' => 'Tüm rezervasyon kayıtlarını görüntüleyin.', 'route' => 'admin.reservations_index'],
                ];
            @endphp

            @foreach ($quickAccessItems as $item)
                <div class="p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-xl font-semibold text-green-800">{{ $item['title'] }}</h2>
                    <p class="mt-2 text-gray-600">{{ $item['description'] }}</p>
                    <a href="{{ route($item['route']) }}"
                       class="mt-4 inline-flex items-center text-green-600 hover:text-green-800">
                        Devamını Gör
                        @include('components.icons.chevron-right', ['class' => 'h-5 w-5 ml-1'])
                    </a>
                </div>
            @endforeach
        </div>

        <!-- New User Creation Link -->
        <div class="mt-6">
            <a href="{{ route('admin.users_create') }}"
               class="inline-flex items-center text-green-600 hover:text-green-800">
                @include('components.icons.plus-circle', ['class' => 'h-5 w-5 mr-2'])
                Yeni Kullanıcı Ekle
            </a>
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

