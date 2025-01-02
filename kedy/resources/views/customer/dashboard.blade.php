@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Customer Dashboard</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Add Your Car</h2>
            <form id="carForm" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="plate" class="block text-sm font-medium text-gray-700">License Plate</label>
                        <input type="text" name="plate" id="plate"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               required>
                    </div>
                    <div>
                        <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                        <select name="make" id="make"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select Make</option>
                        </select>
                    </div>
                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                        <select name="model" id="model"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                            <option value="">Select Model</option>
                        </select>
                    </div>
                    <!-- Rest of the form fields remain the same -->
                </div>

                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                    <input type="number" name="year" id="year" min="1900" max="{{ date('Y') + 1 }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           required>
                </div>
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <input type="text" name="color" id="color"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           required>
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <input type="text" name="type" id="type"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           required>
                </div>
                <div>
                    <label for="fuel_type" class="block text-sm font-medium text-gray-700">Fuel Type</label>
                    <select name="fuel_type" id="fuel_type"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            required>
                        <option value="">Select Fuel Type</option>
                        <option value="gasoline">Gasoline</option>
                        <option value="diesel">Diesel</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_suv" id="is_suv"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <label for="is_suv" class="ml-2 block text-sm text-gray-900">Is SUV</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_electric" id="is_electric"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <label for="is_electric" class="ml-2 block text-sm text-gray-900">Is Electric</label>
                </div>
        </div>
        <div class="mt-4">
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                Add Car
            </button>
        </div>
        </form>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl font-semibold mb-4">Your Cars</h2>
        <div id="userCars" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- User cars will be dynamically loaded here -->
        </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carMake = document.getElementById('make_id');
            const carModel = document.getElementById('model_id');

            carMake.addEventListener('change', function () {
                fetchLocations('/customer/car/makes/' + this.value, carModel);
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
