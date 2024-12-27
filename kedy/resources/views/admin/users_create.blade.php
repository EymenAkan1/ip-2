@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Yeni Kullanıcı Ekle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
            <form action="{{ route('admin.users_store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Ad</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">E-posta</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Şifre</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500" required>
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

