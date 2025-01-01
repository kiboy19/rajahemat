<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $title ?? 'RajaHemat' }}</title>
    <!-- Sertakan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<style>
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<body class="bg-white font-sans">
    <div class="min-h-screen flex flex-col md:flex-row">
        @if(session('success'))
        <div class="fixed top-0 right-0 m-4 p-4 bg-green-500 text-white rounded-lg fade-in">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="fixed top-0 right-0 m-4 p-4 bg-red-500 text-white rounded-lg fade-in">
            {{ session('error') }}
        </div>
        @endif
        {{ $slot }}
        <!-- Script untuk Toggle Sidebar -->
        <script>
            const hamburger = document.getElementById("hamburger");
            const sidebar = document.getElementById("sidebar");

            hamburger.addEventListener("click", () => {
                // Toggle kelas agar sidebar bisa muncul / sembunyi
                sidebar.classList.toggle("-translate-x-full");
            });
        </script>
        <!-- jQuery untuk AJAX Live Search / Filter (opsional) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Jika Anda ingin AJAX-based filter/sort/search di halaman admin
            // mirip dengan /services, bisa ditambahkan di sini.

            $(document).ready(function() {
                function fetchData(page = 1) {
                    let query = $('#search').val();
                    let category = $('#category').val();
                    let sort = $('#sort').val();

                    $.ajax({
                        url: "{{ route('admin.services.index') }}",
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

                // Live search dengan keyup
                $('#search').on('keyup', function() {
                    fetchData();
                });

                // Filter category atau sort change event
                $('#category, #sort').on('change', function() {
                    fetchData();
                });

                // Handle pagination link click jika pakai AJAX pagination
                $(document).on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    let page = $(this).attr('href').split('page=')[1];
                    fetchData(page);
                });
            });
        </script>
    </div>
</body>

</html>
