@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-gray-800">Rezervasyonu Düzenle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <form action="{{ route('admin.reservations_update', $reservation->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Kullanıcı</label>
                <select name="user_id" id="user_id" class="form-select mt-1 block w-full">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if($user->id == $reservation->user_id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Tarih</label>
                <input type="date" name="date" id="date" class="form-input mt-1 block w-full" value="{{ $reservation->date }}" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Durum</label>
                <select name="status" id="status" class="form-select mt-1 block w-full">
                    <option value="pending" @if($reservation->status == 'pending') selected @endif>Beklemede</option>
                    <option value="confirmed" @if($reservation->status == 'confirmed') selected @endif>Onaylandı</option>
                    <option value="cancelled" @if($reservation->status == 'cancelled') selected @endif>İptal Edildi</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Güncelle</button>
        </form>
    </div>
@endsection
