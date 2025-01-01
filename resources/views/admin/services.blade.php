<x-admin-layout :title="'Services'">
    @section('content')
        <h1>Services</h1>
    @endsection

    <x-adminsidebar :adminName="$admin->name" id="sidebar"
        class="md:translate-x-0 -translate-x-full fixed md:static top-0 left-0 h-screen w-64 bg-red-600 transition-transform duration-300"></x-adminsidebar>
    <!-- Konten Utama -->
    <div class="flex-1 p-4 md:p-6 ml-0 md:ml-64 transition-all">
        <!-- Tombol Hamburger (Hanya muncul di layar kecil) -->
        <div class="flex justify-between items-center mb-6 md:hidden">
            <h1 class="text-xl font-bold">Service</h1>
            <button id="hamburger"
                class="text-white bg-blue-800 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Card Container -->
        <div class="bg-white p-4 md:p-6 rounded shadow">

            <!-- Filter, Sort, dan Pencarian (mirip dengan /services/index.blade.php) -->
            <form method="GET" action="{{ route('admin.services.index') }}"
                class="flex flex-col md:flex-row gap-4 md:gap-6 mb-4 items-start md:items-end justify-between"
                id="filterForm">
                <h2 class="text-xl font-bold">Filter</h2>

                <!-- Filter Kategori -->
                <div class="flex flex-col">
                    <label class="font-semibold mb-1">Filter</label>
                    <select name="category" id="category"
                        class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sortir -->
                <div class="flex flex-col">
                    <label class="font-semibold mb-1">Sortir</label>
                    <select name="sort" id="sort"
                        class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        <option value="">Default</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                            Harga Termurah
                        </option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                            Harga Termahal
                        </option>
                    </select>
                </div>

                <!-- Pencarian -->
                <div class="flex flex-col">
                    <label for="search" class="font-semibold mb-1">Cari...</label>
                    <input type="text" name="search" id="search"
                        class="border border-gray-300 rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-600"
                        placeholder="Ketik untuk mencari" value="{{ request('search') }}" />
                </div>
            </form>
            <!-- Tombol Filter -->
            <form action="{{ route('admin.services.fetch') }}" method="POST" class="d-inline">
                @csrf

                <button type="submit"
                    class="text-white bg-blue-800 p-2 rounded-lg text-center hover:bg-blue-700 transition-colors">
                    Ambil Data API
                </button>
            </form>

            <!-- Tombol Tambah Layanan Baru (mengarah ke route admin.services.create) -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.services.create') }}"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Tambah Layanan Baru
                </a>
            </div>

            <!-- Tabel (Responsive) -->
            <div class="overflow-x-auto" id="servicesTable">
                @include('admin.partials.services_table', ['services' => $services])
            </div>
        </div>
    </div>
</x-admin-layout>
