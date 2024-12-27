<!-- resources/views/admin/users/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Kullanıcı Profili</h2>

        <p><strong>İsim:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <!-- Diğer profil bilgileri burada yer alabilir -->

        <a href="{{ route('admin.users_edit', $user->id) }}" class="text-yellow-500">Düzenle</a>
    </div>
@endsection
