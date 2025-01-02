@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-semibold text-green-800 mb-6">Satıcı Paneli</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 10h11M9 21H7a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m7 14a2 2 0 002-2V7a2 2 0 00-2-2H9"/>
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Toplam Otoparklar
                                </dt>
                                <dd class="text-lg font-semibold text-gray-900">
                                    {{ $vendor->parkingLots->count() }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-800">Otoparklarınız</h2>
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead>
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Otopark Adı</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Fiyat</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Kapasite</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vendor->parkingLots as $parkingLot)
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $parkingLot->name }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $parkingLot->price }} ₺</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $parkingLot->capacity }}</td>
                        <td class="py-3 px-4 text-sm">

                            <a href="{{ route('vendor.parking-lots.edit', $parkingLot->id) }}"
                               class="text-blue-500 hover:text-blue-700">Düzenle</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
