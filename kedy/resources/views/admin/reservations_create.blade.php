@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Yeni Rezervasyon Ekle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('admin.reservations_store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Kullanıcı</label>
                    <select name="user_id" id="user_id" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tarih</label>
                    <input type="date" name="date" id="date" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Durum</label>
                    <select name="status" id="status" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500">
                        <option value="pending">Beklemede</option>
                        <option value="confirmed">Onaylandı</option>
                        <option value="cancelled">İptal Edildi</option>
                    </select>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-300">
                        Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

