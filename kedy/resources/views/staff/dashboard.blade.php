@extends('layouts.app')

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
        <form action="{{ route('staff.parking_lot.store') }}" method="POST">
            @csrf

            <!-- Vendor Id-->
            <div class="mb-4">
                <label for="vendor_id" class="block text-sm font-medium text-gray-700">Vendor Seçin</label>
                <select id="vendor_id" name="vendor_id" class="form-select mt-1 block w-full" required>
                    <option value="">Bir Vendor Seçin</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">ID:{{ $vendor->id }}</option>
                    @endforeach
                </select>
                @error('vendor_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Vendor -->
            <div class="mb-4">
                <label for="vendor_name" class="block text-sm font-medium text-gray-700">Vendor Seçin</label>
                <select id="vendor_name" name="vendor_name" class="form-select mt-1 block w-full" required>
                    <option value="">Bir Vendor Seçin</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">İsim: {{ $vendor->name }}</option>
                    @endforeach
                </select>
                @error('vendor_name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="ParkingLot_name" class="block text-sm font-medium text-gray-700">Otopark İsmi</label>
                <input type="text" id="ParkingLot_name" name="ParkingLot_name" class="form-input mt-1 block w-full"
                       required>
                @error('ParkingLot_name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Açıklama -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Açıklama</label>
                <textarea id="description" name="description" class="form-textarea mt-1 block w-full"
                          rows="3">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasyon -->
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Lokasyon</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}"
                       class="form-input mt-1 block w-full" required>
                @error('location')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Şehir -->
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

            <!-- Semt -->
            <div class="mb-4">
                <label for="town_id" class="block text-sm font-medium text-gray-700">Semt Seçin</label>
                <select id="town_id" name="town_id" class="form-select mt-1 block w-full" required>
                    <option value="">Semt seçin</option>
                </select>
                @error('town_id')
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

            <div class="mb-4">
                <label for="available_capacity" class="block text-sm font-medium text-gray-700">Mevcut Kapasite</label>
                <input type="number" id="available_capacity" name="available_capacity"
                       class="form-input mt-1 block w-full" min="1" value="{{ old('available_capacity') }}"
                       placeholder="Mevcut Kapasite" required>
                @error('available_capacity')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Açık mı? -->
            <div class="mb-4">
                <label for="is_open" class="block text-sm font-medium text-gray-700">Açık mı?</label>
                <input type="checkbox" id="is_open" name="is_open" value="1" class="form-checkbox mt-1 block"
                       @if(old('is_open')) checked @endif>
                @error('is_open')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tür -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Otopark Türü</label>
                <select id="type" name="type" class="form-select mt-1 block w-full" required>
                    <option value="">Bir tür seçin</option>
                    @foreach ($parkingLotTypes as $key => $value)
                        <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
                @error('type')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kullanılabilir mi? -->
            <div class="mb-4">
                <label for="is_available" class="block text-sm font-medium text-gray-700">Kullanılabilir mi?</label>
                <input type="checkbox" id="is_available" name="is_available" value="1" class="form-checkbox mt-1 block"
                       @if(old('is_available')) checked @endif>
                @error('is_available')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Services -->
            <div class="mb-4">
                <label for="services" class="block text-sm font-medium text-gray-700">Servisler</label>
                <div class="flex items-center space-x-4 mt-2">
                    <div>
                        <input type="checkbox" id="has_electric_car_charging" name="has_electric_car_charging" value="1">
                        <label for="has_electric_car_charging" class="text-sm font-medium text-gray-700">Elektrikli Araç Şarjı</label>
                    </div>
                    <div>
                        <input type="checkbox" id="has_valet_service" name="has_valet_service" value="1">
                        <label for="has_valet_service" class="text-sm font-medium text-gray-700">Vale Hizmeti</label>
                    </div>
                    <div>
                        <input type="checkbox" id="has_cleaning_service" name="has_cleaning_service" value="1">
                        <label for="has_cleaning_service" class="text-sm font-medium text-gray-700">Temizlik
                            Servisi</label>
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
    $(document).ready(function () {
        // Şehir seçildiğinde ilçeleri yükle
        $('#city_id').on('change', function () {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: '/get-districts/' + city_id,  // Şehir ID'si ile ilçeleri getirmek için AJAX isteği
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#district_id').empty();  // İlçe dropdown'unu temizle
                        $('#district_id').append('<option value="">Bir ilçe seçin</option>');  // İlk seçenek
                        $.each(data, function (key, value) {
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
        $('#district_id').on('change', function () {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: '/get-towns/' + district_id,  // İlçe ID'si ile mahalleleri getirmek için AJAX isteği
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#town_id').empty();  // Mahalle dropdown'unu temizle
                        $('#town_id').append('<option value="">Bir Semt seçin</option>');  // İlk seçenek
                        $.each(data, function (key, value) {
                            $('#town_id').append('<option value="' + value.id + '">' + value.name + '</option>'); // Mahalle seçeneklerini ekle
                        });
                    }
                });
            } else {
                $('#town_id').empty();
                $('#town_id').append('<option value="">Bir Semt seçin</option>');
            }
        });

        $('#town_id').on('change', function () {
            var town_id = $(this).val();
            if (town_id) {
                $.ajax({
                    url: '/get-neighbourhoods/' + town_id,  // İlçe ID'si ile mahalleleri getirmek için AJAX isteği
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#neighbourhood_id').empty();  // Mahalle dropdown'unu temizle
                        $('#neighbourhood_id').append('<option value="">Bir Mahalle seçin</option>');  // İlk seçenek
                        $.each(data, function (key, value) {
                            $('#neighbourhood_id').append('<option value="' + value.id + '">' + value.name + '</option>'); // Mahalle seçeneklerini ekle
                        });
                    }
                });
            } else {
                $('#neighbourhood_id').empty();
                $('#neighbourhood_id').append('<option value="">Bir Mahalle seçin</option>');
            }
        });
    });
</script>
