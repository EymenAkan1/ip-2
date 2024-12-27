@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-gray-800">Yeni Rezervasyon Ekle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <form action="{{ route('admin.reservations.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Kullanıcı</label>
                <select name="user_id" id="user_id" class="form-select mt-1 block w-full">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Tarih</label>
                <input type="date" name="date" id="date" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Durum</label>
                <select name="status" id="status" class="form-select mt-1 block w-full">
                    <option value="pending">Beklemede</option>
                    <option value="confirmed">Onaylandı</option>
                    <option value="cancelled">İptal Edildi</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kaydet</button>
        </form>
    </div>
@endsection
