<x-admin-layout>
    <x-adminsidebar :adminName="$admin->name" id="sidebar"
        class="md:translate-x-0 -translate-x-full fixed md:static top-0 left-0 h-screen w-64 bg-red-600 transition-transform duration-300"></x-adminsidebar>
    <div class="flex justify-between items-center mb-6 p-4 md:hidden">
        <h1 class="text-xl font-bold">Dashboard</h1>
        <button id="hamburger"
            class="text-white bg-blue-800 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <x-admincontent :admin="$admin" :totalUsers="$totalUsers" :users="$users"></x-admincontent>
    <!-- Tombol Hamburger (Hanya muncul di layar kecil) -->
</x-admin-layout>
