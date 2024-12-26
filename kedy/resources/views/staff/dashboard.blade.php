@extends('layouts.staff')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-semibold mb-6">Staff Dashboard</h1>

        <!-- Success message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form action="{{ route('staff.store') }}" method="POST">
            @csrf

            <!-- Vendor -->
            <div class="mb-4">
                <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor Seçin</label>
                <select id="vendor_id" name="vendor_id" class="form-select mt-1 block w-full" required>
                    <option value="">Bir Vendor Seçin</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
                @error('vendor_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="ParkingLot_name" class="block text-sm font-medium text-gray-700">Otopark İsmi</label>
                <select id="ParkingLot_name" name="ParkingLot_name" class="form-select mt-1 block w-full" required>
                    <option value="">Otopark Seçin</option>
                    @foreach ($parkinglots as $parkinglot)
                        <option value="{{ $parkinglot->id }}">{{ $parkinglot->name }}</option>
                    @endforeach
                </select>
                @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="city_id" class="block text-sm font-medium text-gray-700">Şehir Seçin</label>
                <select id="city_id" name="city_id" class="form-select mt-1 block w-full" required>
                    <option value="">Bir şehir seçin</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- İlçe -->
            <div class="mb-4">
                <label for="district_id" class="block text-sm font-medium text-gray-700">İlçe Seçin</label>
                <select id="district_id" name="district_id" class="form-select mt-1 block w-full" required>
                    <option value="">İlçe seçin</option>
                </select>
                @error('district_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mahalle -->
            <div class="mb-4">
                <label for="neighbourhood_id" class="block text-sm font-medium text-gray-700">Mahalle Seçin</label>
                <select id="neighbourhood_id" name="neighbourhood_id" class="form-select mt-1 block w-full" required>
                    <option value="">Mahalle seçin</option>
                </select>
                @error('neighbourhood_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <!-- Capacity -->
            <div class="mb-4">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Kapasite</label>
                <input type="number" id="capacity" name="capacity" class="form-input mt-1 block w-full" min="1"
                       placeholder="Otopark Kapasitesi" required>
                @error('capacity')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Services -->
            <div class="mb-4">
                <label for="services" class="block text-sm font-medium text-gray-700">Servisler</label>
                <div class="flex items-center space-x-4 mt-2">
                    <div>
                        <input type="checkbox" id="has_valet_service" name="has_valet_service">
                        <label for="has_valet_service" class="text-sm font-medium text-gray-700">Vale Servisi</label>
                    </div>
                    <div>
                        <input type="checkbox" id="has_cleaning_service" name="has_cleaning_service">
                        <label for="has_cleaning_service" class="text-sm font-medium text-gray-700">Temizlik
                            Servisi</label>
                    </div>
                    <div>
                        <input type="checkbox" id="has_electric_car_charging" name="has_electric_car_charging">
                        <label for="has_electric_car_charging" class="text-sm font-medium text-gray-700">Elektrikli Araç
                            Şarjı</label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Kaydet</button>
            </div>
        </form>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery'yi ekliyoruz -->
<script>
    $(document).ready(function() {
        // Şehir seçildiğinde ilçeleri yükle
        $('#city_id').on('change', function() {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: '/get-districts/' + city_id,  // Şehir ID'si ile ilçeleri getirmek için AJAX isteği
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district_id').empty();  // İlçe dropdown'unu temizle
                        $('#district_id').append('<option value="">Bir ilçe seçin</option>');  // İlk seçenek
                        $.each(data, function(key, value) {
                            $('#district_id').append('<option value="' + value.id + '">' + value.name + '</option>'); // İlçe seçeneklerini ekle
                        });
                    }
                });
            } else {
                $('#district_id').empty();
                $('#district_id').append('<option value="">Bir ilçe seçin</option>');
            }
        });

        // İlçe seçildiğinde mahalleleri yükle
        $('#district_id').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: '/get-neighbourhoods/' + district_id,  // İlçe ID'si ile mahalleleri getirmek için AJAX isteği
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#neighbourhood_id').empty();  // Mahalle dropdown'unu temizle
                        $('#neighbourhood_id').append('<option value="">Bir mahalle seçin</option>');  // İlk seçenek
                        $.each(data, function(key, value) {
                            $('#neighbourhood_id').append('<option value="' + value.id + '">' + value.name + '</option>'); // Mahalle seçeneklerini ekle
                        });
                    }
                });
            } else {
                $('#neighbourhood_id').empty();
                $('#neighbourhood_id').append('<option value="">Bir mahalle seçin</option>');
            }
        });
    });
</script>
