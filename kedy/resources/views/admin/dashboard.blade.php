@extends('layouts.app')

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
            <a href="{{ route('admin.reservation.index') }}" class="text-blue-500 hover:underline mt-4 block">
                Detaylar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <!-- Kullanıcılar Kartı -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div class="text-gray-700">
                    <h3 class="text-4xl font-semibold">{{ $UserCount }}</h3>
                    <p class="text-lg">Users</p>
                </div>
                <div class="text-green-500">
                    <i class="fas fa-users text-5xl"></i>
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
                    <h3 class="text-4xl font-semibold">{{ $customerCount }}</h3> <!-- Satış sayısı -->
                    <p class="text-lg">Müşteri sayısı</p>
                </div>
                <div class="text-yellow-500">
                    <i class="fas fa-chart-line text-5xl"></i> <!-- Satış ikonu -->
                </div>
            </div>
            <a href="#" class="text-yellow-500 hover:underline mt-4 block">
                Detaylar <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

        <!-- Aktif Kullanıcılar Kartı -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
            <div class="flex items-center justify-between">
                <div class="text-gray-700">
                    <h3 class="text-4xl font-semibold">128</h3> <!-- Aktif kullanıcı sayısı -->
                    <p class="text-lg">Aktif Kullanıcılar</p>
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

            <!-- Audit Log Kutusu -->
            <div class="p-6 bg-white rounded shadow">
                <h2 class="text-xl font-semibold text-gray-800">Sistem Logları</h2>
                <p class="mt-2 text-gray-600">Tüm sistem hareketlerini inceleyin.</p>
                <a href="{{ route('admin.audit_logs.index') }}" class="mt-4 inline-block text-blue-500 text-sm">
                    Devamını Gör
                </a>
            </div>
        </div>
    </div>
@endsection
