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
    <nav class="bg-white border border-white rounded-[20px] shadow-md px-20 py-4 mx-20 mt-4 sm:px-10 md:px-14 lg:px-20">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div>
                <img src="/storage/img/rajahemat.png" class="w-12 h-12" alt="">
            </div>
            
            <!-- Hamburger Icon for Mobile -->
            <button class="lg:hidden text-black" onclick="toggleNavbar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navbar Links for Desktop -->
            <div class="hidden lg:flex items-center space-x-4 sm:space-x-6" id="nav-menu">
                <a href="/" class="text-black font-semibold hover:text-red-900">Sign In</a>
                <a href="#services" class="text-black font-semibold hover:text-red-900">How It Works</a>
                <a href="#howitworks" class="text-black font-semibold hover:text-red-900">Services</a>
                <a href="/daftar" class="text-black font-semibold hover:text-red-900">Sign Up</a>
                <select class="bg-gray-700 text-white p-2 rounded">
                    <option value="en">English</option>
                    <option value="id">Bahasa Indonesia</option>
                </select>
            </div>
        </div>

        <!-- Menu Toggle for Mobile -->
        <div class="lg:hidden hidden flex-col bg-gray-800 border border-gray-800 rounded-[20px] absolute top-16 right-4 p-4 space-y-4" id="nav-menu">
            <a href="/" class="text-black font-semibold hover:text-red-900">Sign In</a>
            <a href="#services" class="text-black font-semibold hover:text-red-900">How It Works</a>
            <a href="#howitworks" class="text-black font-semibold hover:text-red-900">Services</a>
            <a href="daftar" class="text-black font-semibold hover:text-red-900">Sign Up</a>
            <select class="bg-gray-700 text-white p-2 rounded">
                <option value="en">English</option>
                <option value="id">Bahasa Indonesia</option>
            </select>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4 sm:px-8 md:px-12 lg:px-20">
            <div class="flex flex-col lg:flex-row items-center bg-red-900 overflow-hidden space-y-6 lg:space-y-0 lg:space-x-6">
                <!-- Left Column -->
                <div class="lg:w-1/2 p-8 text-white text-center flex flex-col justify-center">
                    <h1 class="text-4xl font-bold mb-4">Join Us Today!</h1>
                    <p class="text-lg mb-6">Unlock exclusive features and enjoy a seamless experience. Sign up now to get started!</p>
                </div>
                <!-- Right Column -->
                <div class="lg:w-1/2 p-8 w-full">
                    <div class="bg-red-900 border border-red-900 rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.50)] p-6">
                        <h2 class="text-2xl font-bold mb-4 text-white">Register</h2>
                        <form>
                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="block text-white mb-2">Name</label>
                                <input type="text" id="name" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter your username" required>
                            </div>
                             <!-- Email Field -->
                             <div class="mb-4">
                                <label for="email" class="block text-white mb-2">Email</label>
                                <input type="email" id="email" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="Username" required>
                            </div>
                            <!-- Password Field -->
                            <div class="mb-4">
                                <label for="password" class="block text-white mb-2">Password</label>
                                <input type="password" id="password" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="Password" required>
                            </div>
                            <!-- Submit Button -->
                            <div class="mb-4">
                                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-gray-200 hover:text-black transition">
                                    Sign Up
                                </button>
                            </div>
                            <!-- Sign In Link -->
                            <div class="text-center">
                                <p class="text-white">
                                    Already have an account? 
                                    <a href="/" class="text-white hover:text-blue-500">Sign In</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Section -->
    <div class="bg-white py-6">
        <div class="container mx-auto text-center">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Column 1: Facebook -->
                <div>
                    <a href="">
                        <img src="/storage/img/facebooktext.png" alt="Facebook" class="w-20 h-30 py-4 mx-auto">
                    </a>
                </div>
                <!-- Column 2: Twitter -->
                <div>
                    <a href="">
                        <img src="/storage/img/xtext.png" alt="Twitter" class="w-20 h-30 py-1 mx-auto">
                    </a>
                </div>
                <!-- Column 3: Instagram -->
                <div>
                    <a href="">
                        <img src="/storage/img/instagramtext.png" alt="Instagram" class="w-20 h-30 py-4 mx-auto">
                    </a>
                </div>
                <!-- Column 4: TikTok -->
                <div>
                    <a href="">
                        <img src="/storage/img/tiktoktext.png" alt="TikTok" class="w-20 h-30 py-4 mx-auto">
                    </a>
                </div>
                <!-- Column 5: YouTube -->
                <div>
                    <a href="">
                        <img src="/storage/img/yttext.png" alt="YouTube" class="w-20 h-30 py-2 mx-auto">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Service -->
    <!-- Baris pertama -->
    <div class="bg-white py-6">
    <div class="container mx-auto py-12 text-center">
        <h2 class="text-4xl font-bold mb-4">Our Service</h2>
        <p class="text-lg mb-6">We provide high-quality services to ensure your business runs smoothly. Here are some of the services we offer:</p>
        <p class="text-sm">Feel free to explore and reach out to us for any questions!</p>
    </div>
    </div>

    <!-- Baris kedua -->
    <div class="bg-white">
    <div class="container mx-auto py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Kolom 1 -->
            <div class="bg-white border border-white rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] p-6">
                <img src="/storage/img/Logo Instagram.png" alt="Instagram" class="w-16 h-16 mb-6">
                <h3 class="text-2xl font-semibold mb-2">Instagram Service</h3>
                <p class="text-sm">A leader in search and internet services. We help you find everything online.</p>
            </div>
            <!-- Kolom 2 -->
            <div class="bg-white border border-white rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] p-6">
                <img src="/storage/img/Logo Youtube.png" alt="YouTube" class="w-16 h-16 mb-4">
                <h3 class="text-2xl font-semibold mb-2">Youtube Service</h3>
                <p class="text-sm">Innovating technology for a better tomorrow. Offering cutting-edge devices and software.</p>
            </div>
            <!-- Kolom 3 -->
            <div class="bg-white border border-white rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] p-6">
                <img src="/storage/img/Logo_Tiktok-removebg-preview.png" alt="TikTok" class="w-16 h-16 mb-4">
                <h3 class="text-2xl font-semibold mb-2">TikTok Service</h3>
                <p class="text-sm">Connecting people globally. Stay in touch with friends and communities.</p>
            </div>
            <!-- Kolom 4 -->
            <div class="bg-white border border-white rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] p-6">
                <img src="/storage/img/Logo Custom Service.png" alt="Custom" class="w-16 h-16 mb-4">
                <h3 class="text-2xl font-semibold mb-2">Custom Service</h3>
                <p class="text-sm">Real-time updates and conversations. Join the global discussion.</p>
            </div>
        </div>
    </div>
    </div>

    <!-- Payment Method -->
<div class="bg-white">
    <div class="container mx-auto py-12 text-center">
        <h2 class="text-4xl font-bold mb-4">Payment Method</h2>
        <p class="text-lg mb-6">Choose from a variety of payment methods to make your transactions quick and seamless.</p>
    </div>
</div>

<div class="bg-white">
    <div class="container mx-auto pb-12"> 
        <!-- Baris kedua (3 kolom) -->
        <div class="flex justify-center items-center mb-6">
            <div class="grid grid-cols-3 gap-20">
                <!-- Kolom 1 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/512px-Logo_dana_blue.svg.png" alt="DANA" class="h-12">
                </div>
                <!-- Kolom 2 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_ovo_purple.svg/512px-Logo_ovo_purple.svg.png" alt="OVO" class="h-12">
                </div>
                <!-- Kolom 3 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/86/Gopay_logo.svg/308px-Gopay_logo.svg.png" alt="GoPay" class="h-12">
                </div>
            </div>
        </div>
        <!-- Baris ketiga (3 kolom) -->
        <div class="flex justify-center items-center">
            <div class="grid grid-cols-3 gap-20">
                <!-- Kolom 1 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Shopee.svg/150px-Shopee.svg.png" alt="ShopeePay" class="h-12">
                </div>
                <!-- Kolom 2 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/220px-PayPal.svg.png" alt="PayPal" class="h-12">
                </div>
                <!-- Kolom 3 -->
                <div class="bg-white p-6 max-w-[200px] rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.70)] flex items-center justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Apple_Pay_logo.svg/100px-Apple_Pay_logo.svg.png" alt="" class="h-12">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-red-900 text-white py-12">
    <!-- Baris pertama: Judul dan Tombol Join Us -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Ready to start with us?</h2>
        <a href="/daftar" class="bg-green-600 text-white py-3 px-6 rounded-md hover:bg-gray-200 hover:text-black transition">
            Join Us
        </a>
    </div>

    <!-- Baris kedua: 3 kolom -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12 px-6">
        <!-- Kolom pertama: Lokasi dan Peta -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Location</h3>
            <p class="mb-4">Kota Bandung, Jawa Barat, Indonesia</p>
            <!-- Peta Bandung (contoh menggunakan iframe) -->
            <iframe
                class="w-full h-40 rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d198499.4991426437!2d107.5864132591035!3d-6.917464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e68c8df8b70b%3A0x2e68c8df8df8b70b!2sBandung!5e0!3m2!1sen!2sid!4v1677797682763!5m2!1sen!2sid"
                allowfullscreen=""
                loading="lazy"></iframe>
        </div>

        <!-- Kolom kedua: Quick Links -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="#home" class="hover:text-gray-400">Home</a></li>
                <li><a href="#login" class="hover:text-gray-400">Login</a></li>
                <li><a href="#signup" class="hover:text-gray-400">Sign Up</a></li>
                <li><a href="#services" class="hover:text-gray-400">Services</a></li>
                <li><a href="#terms" class="hover:text-gray-400">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Kolom ketiga: Reach Us -->
        <div>
            <h3 class="text-xl font-semibold mb-4">Reach Us</h3>
            <p>Email: <a href="mailto:admin@rajahemat.com" class="text-blue-400 hover:text-blue-500">admin@rajahemat.com</a></p>
        </div>
    </div>

    <!-- Baris ketiga: Copyright -->
    <div class="text-center mt-12">
        <p class="text-sm">&copy; 2024 RajaHemat, All Rights Reserved.</p>
    </div>
</footer>
</body>
</html>
