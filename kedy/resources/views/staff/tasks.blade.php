@if(Auth::check())
    @php
        $role = Auth::user()->role; // Kullanıcı rolünü alıyoruz
    @endphp

        <!-- Admin Menüsü -->
    @if($role === 'admin')
        <div>
            <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Admin Dashboard</a>
            <a href="{{ route('admin.users_index') }}" class="block py-2 px-4 hover:bg-gray-700">User Management</a>
        </div>
    @endif

    <!-- Staff Menüsü -->
    @if($role === 'staff')
        <div>
            <a href="{{ route('staff.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Staff Dashboard</a>
            <a href="{{ route('staff.tasks') }}" class="block py-2 px-4 hover:bg-gray-700">Tasks</a>
        </div>
    @endif

    <!-- Vendor Menüsü -->
    @if($role === 'vendor')
        <div>
            <a href="{{ route('vendor.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Vendor Dashboard</a>
            <a href="{{ route('vendor.parking-lots_index') }}" class="block py-2 px-4 hover:bg-gray-700">My Parking Lots</a>
            <a href="{{ route('vendor.services') }}" class="block py-2 px-4 hover:bg-gray-700">Services</a>
        </div>
    @endif

    <!-- Worker Menüsü -->
    @if($role === 'worker')
        <div>
            <a href="{{ route('worker.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Worker Dashboard</a>
            <a href="{{ route('worker.tasks') }}" class="block py-2 px-4 hover:bg-gray-700">Tasks</a>
        </div>
    @endif

    <!-- Customer Menüsü -->
    @if($role === 'customer')
        <div>
            <a href="{{ route('customer.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Customer Dashboard</a>
            <a href="{{ route('customer.parking-lots') }}" class="block py-2 px-4 hover:bg-gray-700">Available Parking Lots</a>
            <a href="{{ route('customer.bookings') }}" class="block py-2 px-4 hover:bg-gray-700">My Bookings</a>
        </div>
    @endif
@endif
