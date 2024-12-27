@extends('layouts.app') <!-- Breeze layout'unu kullanıyoruz -->

@section('header')
    <h1 class="text-3xl font-semibold text-gray-800">Admin Dashboard</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">


            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <h3 class="text-4xl font-semibold">{{ $reservations->count() }}</h3>
                        <p class="text-lg">Rezervasyonlar</p>
                    </div>
                    <div class="text-blue-500">
                        <i class="fas fa-box text-5xl"></i> <!-- Ürün ikonu -->
                    </div>
                </div>
                <a href="{{ route('admin.reservations.index') }}" class="text-blue-500 hover:underline mt-4 block">
                    Detaylar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <!-- Kullanıcılar Kartı -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <h3 class="text-4xl font-semibold">{{ $customerCount }}</h3>
                        <p class="text-lg">Customer</p>
                    </div>
                    <div class="text-green-500">
                        <i class="fas fa-customers text-5xl"></i>
                    </div>
                </div>
                <a href="{{ route('admin.users.index') }}" class="text-green-500 hover:underline mt-4 block">
                    Detaylar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <!-- Satışlar Kartı -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <h3 class="text-4xl font-semibold">{{ $allparkinglotCount }}</h3>
                        <p class="text-lg">Otopark Sayısı</p>
                    </div>
                    <div class="text-yellow-500">
                        <i class="fas fa-chart-line text-5xl"></i>
                    </div>
                </div>
                <a href="#" class="text-yellow-500 hover:underline mt-4 block">
                    Detaylar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

            <!-- Aktif Otoparkların Kartı -->
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <h3 class="text-4xl font-semibold">{{ $openparkinglotCount }}</h3> <!-- Aktif kullanıcı sayısı -->
                        <p class="text-lg">Aktif Otopark Sayısı</p>
                    </div>
                    <div class="text-indigo-500">
                        <i class="fas fa-users-cog text-5xl"></i> <!-- Aktif kullanıcı ikonu -->
                    </div>
                </div>
                <a href="#" class="text-indigo-500 hover:underline mt-4 block">
                    Detaylar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>

        </div>

        <!-- Grafik ve İstatistikler -->
        <div class="mt-12">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-semibold text-gray-800">Son 7 Günlük Satış İstatistikleri</h2>
                <div class="mt-6">
                    <div class="w-full h-64 bg-gray-200 rounded-lg"></div>
                    <p class="text-center text-gray-500 mt-4"></p>
                </div>
            </div>
        </div>

    </div>
@stop



@section('content')
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Kullanıcı Kutusu -->
            <div class="p-6 bg-white rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800">Kullanıcılar</h2>
                <p class="mt-2 text-gray-600">Sistemdeki tüm kullanıcıları görüntüle ve yönet.</p>
                <a href="{{ route('admin.users.index') }}" class="mt-4 inline-block text-blue-500 text-sm">
                    Devamını Gör
                </a>
            </div>

            <!-- Rezervasyon Kutusu -->
            <div class="p-6 bg-white rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800">Rezervasyonlar</h2>
                <p class="mt-2 text-gray-600">Tüm rezervasyon kayıtlarını görüntüleyin.</p>
                <a href="{{ route('admin.reservations.index') }}" class="mt-4 inline-block text-blue-500 text-sm">
                    Devamını Gör
                </a>
            </div>

        </div>
    </div>
@endsection
