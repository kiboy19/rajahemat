<!-- resources/views/components/app-layout.blade.php -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMM Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Component -->
    <x-navser></x-navser>

    <div class="container mt-4">
        <!-- Alert Component -->
        <x-alert />

        <!-- Slot untuk Konten Utama -->
        {{ $slot }}
    </div>

    <!-- Bootstrap JS dan dependensinya -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
