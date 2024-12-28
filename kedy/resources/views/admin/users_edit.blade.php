@extends('layouts.app')

@section('header')
    <h1 class="text-3xl font-semibold text-green-800">Kullanıcıyı Düzenle</h1>
@endsection

@section('content')
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users_update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">İsim</label>
                    <input type="text" name="name" id="name"
                           class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500"
                           value="{{ $user->name }}" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email"
                           class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500"
                           value="{{ $user->email }}" required>
                </div>
                <div class="mb-6">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Rol</label>
                    <select name="role" id="role"
                            class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-green-500"
                            required>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-300">
                        Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

