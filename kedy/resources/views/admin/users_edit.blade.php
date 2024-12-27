@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kullanıcıyı Düzenle</h2>

        <form action="{{ route('admin.users_update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- İsim -->
            <div class="form-group">
                <label for="name">İsim</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <!-- Rol -->
            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                            {{ ucfirst($role) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
