@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold text-gray-800">Kullanıcılar</h2>

        <div class="mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Ad</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Rol</th>
                    <th class="px-4 py-2 border-b">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $user->role }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.users.show', $user->id) }}" class="text-blue-500">Görüntüle</a>
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="text-yellow-500 ml-2">Düzenle</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
