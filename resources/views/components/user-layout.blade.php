<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'RajaHemat' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            overflow-x: hidden;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .opacity-0 {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Notifikasi Sukses -->
    @if (session('success'))
        <div class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50 fade-in">
            {{ session('success') }}
        </div>
    @endif

    <!-- Notifikasi Error -->
    @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-500 text-white p-4 rounded-lg shadow-lg z-50 fade-in">
            {{ session('error') }}
        </div>
    @endif
    {{ $slot }}
    <!-- Script untuk Toggle Sidebar -->
    <script>
        const hamburger = document.getElementById("hamburger");
        const sidebar = document.getElementById("sidebar");

        if (hamburger && sidebar) {
            hamburger.addEventListener("click", () => {
                // Toggle kelas agar sidebar bisa muncul / sembunyi
                sidebar.classList.toggle("-translate-x-full");
            });
        }

        // Script untuk Menghilangkan Notifikasi setelah 3 detik
        window.addEventListener('load', () => {
            setTimeout(() => {
                const notifications = document.querySelectorAll('.fade-in');
                notifications.forEach(notification => {
                    notification.classList.add('opacity-0');
                    setTimeout(() => {
                        notification.remove();
                    }, 500); // Waktu transisi
                });
            }, 3000); // 3 detik
        });
    </script>


</body>

</html>
