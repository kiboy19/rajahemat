<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-red-900 border border-red-900 rounded-[20px] shadow-md px-20 py-4 mx-20 mt-4 sm:px-10 md:px-14 lg:px-20 relative">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div>
                <img src="/storage/img/rajahemat.png" class="w-12 h-12" alt="Logo">
            </div>

            <!-- Hamburger Icon for Mobile -->
            <button class="lg:hidden text-white focus:outline-none" onclick="toggleNavbar()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navbar Links for Desktop -->
            <div id="desktop-nav" class="hidden lg:flex items-center space-x-4 sm:space-x-6">
                <a href="/" class="text-white font-semibold hover:text-black">Sign In</a>
                <a href="howitworks.html" class="text-white font-semibold hover:text-black">How It Works</a>
                <a href="#howitworks" class="text-white font-semibold hover:text-black">Services</a>
                <a href="/register" class="text-white font-semibold hover:text-black">Sign Up</a>
                <select class="bg-white text-black p-2 rounded">
                    <option value="en">English</option>
                    <option value="id">Bahasa Indonesia</option>
                </select>
            </div>
        </div>

        <!-- Mobile Nav (Dropdown) -->
        <div id="mobile-nav" 
            class="hidden flex-col bg-red-900 text-white rounded-b-[20px] shadow-md absolute top-16 left-0 right-0 w-full px-6 py-4 transition-all duration-500 ease-in-out opacity-0 transform scale-y-0 origin-top">
            <ul class="space-y-4 text-center">
                <li><a href="index.html" class="font-semibold hover:text-red-400 block">Sign In</a></li>
                <li><a href="howitworks.html" class="font-semibold hover:text-red-400 block">How It Works</a></li>
                <li><a href="#howitworks" class="font-semibold hover:text-red-400 block">Services</a></li>
                <li><a href="/register" class="font-semibold hover:text-red-400 block">Sign Up</a></li>
                <li>
                    <select class="bg-white text-black p-2 rounded w-full">
                        <option value="en">English</option>
                        <option value="id">Bahasa Indonesia</option>
                    </select>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Forgot Password Form -->
    <div class="container mx-auto mt-10 max-w-md bg-white border border-gray-200 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Forgot Password</h2>
        <form action="/reset-password" method="POST" class="space-y-6">
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <!-- New Password -->
            <div>
                <label for="new-password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input type="password" id="new-password" name="new-password" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <!-- Reset Password Button -->
            <div>
                <button type="submit" 
                        class="w-full bg-green-700 hover:bg-green-800 text-white font-semibold py-2 px-4 rounded">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

    <script>
        // Function to toggle the mobile navigation menu
        function toggleNavbar() {
            const mobileNav = document.getElementById("mobile-nav");
    
            // Check if mobileNav is hidden
            if (mobileNav.classList.contains("hidden")) {
                mobileNav.classList.remove("hidden");
                setTimeout(() => {
                    mobileNav.classList.add("opacity-100", "scale-y-100");
                    mobileNav.classList.remove("opacity-0", "scale-y-0");
                }, 10); // Slight delay for smooth transition
            } else {
                mobileNav.classList.add("opacity-0", "scale-y-0");
                mobileNav.classList.remove("opacity-100", "scale-y-100");
                setTimeout(() => mobileNav.classList.add("hidden"), 500); // Hide after transition
            }
        }
    
        // Function to handle screen resize
        function handleResize() {
            const mobileNav = document.getElementById("mobile-nav");
            const desktopBreakpoint = 1024; // Tailwind's lg breakpoint
    
            // Check if screen width is greater than or equal to desktop breakpoint
            if (window.innerWidth >= desktopBreakpoint && !mobileNav.classList.contains("hidden")) {
                mobileNav.classList.add("hidden");
                mobileNav.classList.remove("opacity-100", "scale-y-100");
                mobileNav.classList.add("opacity-0", "scale-y-0");
            }
        }
    
        // Add event listener for screen resize
        window.addEventListener("resize", handleResize);
    </script>    
</body>
</html>
