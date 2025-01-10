<x-admin-layout :title="'History'">
    @section('content')
        <h1>History</h1>
    @endsection

    <div class="relative min-h-screen">
        <!-- Sidebar -->
        <x-adminsidebar :adminName="$admin->name" id="sidebar"
            class="md:translate-x-0 -translate-x-full fixed md:static top-0 left-0 h-screen w-64 bg-red-600 transition-transform duration-300"></x-adminsidebar>
        <div class="flex justify-between items-center mb-6 p-4 md:hidden">
            <h1 class="text-xl font-bold">History Orders</h1>
            <button id="hamburger"
                class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Main Content -->
        <main id="main-content" class="flex-1 lg:ml-64 p-4 lg:p-8 transition-all duration-300 ease-in-out">
            <!-- Search Bar -->
            <x-history-content-searchbar></x-history-content-searchbar>

            <!-- Scrollable Table -->
            <div id="ordersTable">
                @include('admin.partials.orders-table', ['admin' => $admin, 'orders' => $orders])
            </div>
        </main>
    </div>

    <!-- Script untuk AJAX Search -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchOrders(page = 1) {
                let query = $('#search').val();

                $.ajax({
                    url: "{{ route('admin.history') }}",
                    type: "GET",
                    data: {
                        search: query,
                        page: page
                    },
                    success: function(response) {
                        $('#ordersTable').html(response.html);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            // Live search dengan keyup (debounced)
            let typingTimer;
            let doneTypingInterval = 500; // waktu dalam milidetik

            $('#search').on('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(fetchOrders, doneTypingInterval);
            });

            // Jika user masih mengetik, reset timer
            $('#search').on('keydown', function() {
                clearTimeout(typingTimer);
            });

            // Search button click
            $('#searchButton').on('click', function() {
                fetchOrders();
            });

            // Handle pagination link click
            $(document).on('click', '#ordersTable .pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetchOrders(page);
            });
        });
    </script>
</x-admin-layout>
