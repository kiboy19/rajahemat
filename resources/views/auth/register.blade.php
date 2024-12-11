<!DOCTYPE html>
<html lang="id">
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
{{-- <body>
    <form action="/register" method="POST">
    <div class="login-container">
        @error('name')
        <small class="">{{ $message }}</small>
        @enderror
        <h1>Register</h1>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
        @error('email')
        <small class="">{{ $message }}</small>
        @enderror
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" required>
            </div>
        @error('password')
            <small class="">{{ $message }}</small>
            
        @enderror
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            @error('confirm_password')
            <small class="">{{ $message }}</small>
            
        @enderror
            <div class="form-group">
                <label for="confirm_password">Password</label>
                <input type="password" id="confirm password" name="confirm password" required>
            </div>
            @csrf
            <button type="submit" class="login-button">Masuk</button>
        </form>
       </div>
       <script>
        $('.show-confirm-password').on('click', function(){
            if($('#confirm-password').atte('type') == 'password'){
                $('#confirm-password').atte('type', 'text');
            }else{
                $('#confirm-password').atte('type', 'password');
            }
        })
    </script>
</body> --}}
</html>
