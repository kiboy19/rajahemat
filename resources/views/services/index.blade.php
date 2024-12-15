<!-- resources/views/services/index.blade.php -->

<x-app-layout>
    <div class="container">
        <h1 class="mb-4">Daftar Layanan</h1>

        <!-- Form Filter, Sortir, dan Pencarian -->
        <form method="GET" action="{{ route('services.index') }}" class="row g-3 mb-4" id="filterForm">
            <!-- Filter Kategori -->
            <div class="col-md-3">
                <label for="category" class="form-label">Filter</label>
                <select name="category" id="category" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Sortir Harga -->
            <div class="col-md-3">
                <label for="sort" class="form-label">Sortir</label>
                <select name="sort" id="sort" class="form-select">
                    <option value="">Default</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Termurah
                    </option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Termahal
                    </option>
                </select>
            </div>

            <!-- Live Search -->
            <div class="col-md-4">
                <label for="search" class="form-label">Cari...</label>
                <input type="text" name="search" id="search" class="form-control"
                    placeholder="Ketik untuk mencari" value="{{ request('search') }}">
            </div>

            <!-- Tombol Filter -->
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        <!-- Tombol Ambil Data API dan Tambah Layanan -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ route('services.fetch') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-primary">Ambil Data dari API (Guzzle)</button>
            </form>
            <a href="{{ route('services.create') }}" class="btn btn-success">Tambah Layanan Baru</a>
        </div>

        <!-- Partial Tabel Layanan -->
        <div id="servicesTable">
            @include('services.partials.services_table', ['services' => $services])
        </div>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Live search dengan keyup
                $('#search').on('keyup', function() {
                    fetchData();
                });

                // Filter category atau sort change event
                $('#category, #sort').on('change', function() {
                    fetchData();
                });

                function fetchData(page = 1) {
                    var query = $('#search').val();
                    var category = $('#category').val();
                    var sort = $('#sort').val();

                    $.ajax({
                        url: "{{ route('services.index') }}",
                        type: "GET",
                        data: {
                            search: query,
                            category: category,
                            sort: sort
                        },
                        success: function(response) {
                            // response.html berisi partial table
                            $('#servicesTable').html(response.html);
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }

                // Handle pagination link click jika mau AJAX pagination:
                // (Opsional, jika ingin pagination juga menggunakan AJAX)
                $(document).on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    fetchData(page);
                });
            });
        </script>
    @endpush
</x-app-layout>
