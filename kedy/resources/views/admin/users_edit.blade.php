@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-gray-800">Kullanıcıyı Düzenle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <form action="{{ route('admin.update.user', $user->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Ad</label>
                <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ $user->name }}" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-posta</label>
                <input type="email" name="email" id="email" class="form-input mt-1 block w-full" value="{{ $user->email }}" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Güncelle</button>
        </form>
    </div>
@endsection
