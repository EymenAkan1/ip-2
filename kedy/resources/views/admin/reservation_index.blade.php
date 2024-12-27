@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-3xl font-semibold text-gray-800">Rezervasyonlar</h2>

        <div class="mt-6">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead>
                <tr>
                    <th class="px-4 py-2 border-b">ID</th>
                    <th class="px-4 py-2 border-b">Kullanıcı</th>
                    <th class="px-4 py-2 border-b">Araç Plakası</th>
                    <th class="px-4 py-2 border-b">Durum</th>
                    <th class="px-4 py-2 border-b">Başlangıç Tarihi</th>
                    <th class="px-4 py-2 border-b">Bitiş Tarihi</th>
                    <th class="px-4 py-2 border-b">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $reservation->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $reservation->customer->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $reservation->vehicle_plate }}</td>
                        <td class="px-4 py-2 border-b">{{ $reservation->status }}</td>
                        <td class="px-4 py-2 border-b">{{ $reservation->start_date }}</td>
                        <td class="px-4 py-2 border-b">{{ $reservation->end_date }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.reservations_show', $reservation->id) }}" class="text-blue-500">Görüntüle</a>
                            <form action="{{ route('admin.reservations_destroy', $reservation->id) }}" method="POST" class="inline-block ml-2">
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
                {{ $reservations->links() }}
            </div>
        </div>
    </div>
@endsection
