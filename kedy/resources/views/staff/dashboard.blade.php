@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Staff Dashboard</h1>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Add New Parking Lot</h2>

            <form action="{{ route('staff.parking_lot.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Vendor Selection -->
                    <div>
                        <label for="vendor_id" class="block text-sm font-medium text-gray-700 mb-2">Vendor</label>
                        <select id="vendor_id" name="vendor_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a Vendor</option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">ID: {{ $vendor->id }} -
                                    Name: {{ $vendor->name }}</option>
                            @endforeach
                        </select>
                        @error('vendor_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Parking Lot Name -->
                    <div>
                        <label for="ParkingLot_name" class="block text-sm font-medium text-gray-700 mb-2">Parking Lot
                            Name</label>
                        <input type="text" id="ParkingLot_name" name="ParkingLot_name"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                        @error('ParkingLot_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description"
                               class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" id="location" name="location"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                        @error('location')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- City -->
                    <div>
                        <label for="city_id" class="block text-sm font-medium text-gray-700 mb-2">City</label>
                        <select id="city_id" name="city_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a city</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- District -->
                    <div>
                        <label for="district_id" class="block text-sm font-medium text-gray-700 mb-2">District</label>
                        <select id="district_id" name="district_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a district</option>
                        </select>
                        @error('district_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Town -->
                    <div>
                        <label for="town_id" class="block text-sm font-medium text-gray-700 mb-2">Town</label>
                        <select id="town_id" name="town_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a town</option>
                        </select>
                        @error('town_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Neighbourhood -->
                    <div>
                        <label for="neighbourhood_id"
                               class="block text-sm font-medium text-gray-700 mb-2">Neighbourhood</label>
                        <select id="neighbourhood_id" name="neighbourhood_id"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a neighbourhood</option>
                        </select>
                        @error('neighbourhood_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Capacity -->
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">Capacity</label>
                        <input type="number" id="capacity" name="capacity" min="1"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                        @error('capacity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Available Capacity -->
                    <div>
                        <label for="available_capacity" class="block text-sm font-medium text-gray-700 mb-2">Available
                            Capacity</label>
                        <input type="number" id="available_capacity" name="available_capacity" min="0"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                        @error('available_capacity')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Open -->
                    <div>
                        <label for="is_open" class="flex items-center">
                            <input type="checkbox" id="is_open" name="is_open" value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Is Open?</span>
                        </label>
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Parking Lot Type</label>
                        <select id="type" name="type"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select a type</option>
                            @foreach ($parkingLotTypes as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Available -->
                    <div>
                        <label for="is_available" class="flex items-center">
                            <input type="checkbox" id="is_available" name="is_available" value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Is Available?</span>
                        </label>
                    </div>
                </div>

                <!-- Services -->
                <div class="mt-6">
                    <span class="block text-sm font-medium text-gray-700 mb-2">Services</span>
                    <div class="space-y-2">
                        <label for="has_electric_car_charging" class="flex items-center">
                            <input type="checkbox" id="has_electric_car_charging" name="has_electric_car_charging"
                                   value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Electric Car Charging</span>
                        </label>
                        <label for="has_valet_service" class="flex items-center">
                            <input type="checkbox" id="has_valet_service" name="has_valet_service" value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Valet Service</span>
                        </label>
                        <label for="has_cleaning_service" class="flex items-center">
                            <input type="checkbox" id="has_cleaning_service" name="has_cleaning_service" value="1"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Cleaning Service</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Parking Lot
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const citySelect = document.getElementById('city_id');
            const districtSelect = document.getElementById('district_id');
            const townSelect = document.getElementById('town_id');
            const neighbourhoodSelect = document.getElementById('neighbourhood_id');

            citySelect.addEventListener('change', function () {
                fetchLocations('/get-districts/' + this.value, districtSelect);
            });

            districtSelect.addEventListener('change', function () {
                fetchLocations('/get-towns/' + this.value, townSelect);
            });

            townSelect.addEventListener('change', function () {
                fetchLocations('/get-neighbourhoods/' + this.value, neighbourhoodSelect);
            });

            function fetchLocations(url, selectElement) {
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        selectElement.innerHTML = '<option value="">Select an option</option>';
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.name;
                            selectElement.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endsection

