@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Rezervasyonu Düzenle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('admin.reservations_update', $reservation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Kullanıcı</label>
                    <select name="user_id" id="user_id" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($user->id == $reservation->user_id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Tarih</label>
                    <input type="date" name="date" id="date" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500" value="{{ $reservation->date }}" required>
                </div>
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Durum</label>
                    <select name="status" id="status" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500">
                        <option value="pending" @if($reservation->status == 'pending') selected @endif>Beklemede</option>
                        <option value="confirmed" @if($reservation->status == 'confirmed') selected @endif>Onaylandı</option>
                        <option value="cancelled" @if($reservation->status == 'cancelled') selected @endif>İptal Edildi</option>
                    </select>
                </div>
                <div class="flex items-center justify-end">
                    <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-300">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

