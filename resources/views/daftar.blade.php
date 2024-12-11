<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Fungsi untuk toggle navbar
        function toggleNavbar() {
            const navMenu = document.getElementById('nav-menu');
            navMenu.classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-red-900">
    
    <!-- Navbar -->
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <x-hero-daftar></x-hero-daftar>

    <!-- Social Media Section -->
    <x-sosmed></x-sosmed>

    <!-- Our Service -->
    <x-our-service></x-our-service>

    <!-- Payment Method -->
    <x-payment-method></x-payment-method>

    <!-- Footer -->
    <x-footer></x-footer>

</body>
</html>
