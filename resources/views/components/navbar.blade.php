<nav class="bg-white border border-white rounded-[20px] shadow-md px-20 py-4 mx-20 mt-4 sm:px-10 md:px-14 lg:px-20 relative">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div>
            <img src="/storage/img/rajahemat.png" class="w-12 h-12" alt="Logo">
        </div>

        <!-- Hamburger Icon for Mobile -->
        <button class="lg:hidden text-black focus:outline-none" onclick="toggleNavbar()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navbar Links for Desktop -->
        <div id="desktop-nav" class="hidden lg:flex items-center space-x-4 sm:space-x-6">
            <a href="/" class="text-black font-semibold hover:text-red-900">Sign In</a>
            <a href="howitworks.html" class="text-black font-semibold hover:text-red-900">How It Works</a>
            <a href="#howitworks" class="text-black font-semibold hover:text-red-900">Services</a>
            <a href="/register" class="text-black font-semibold hover:text-red-900">Sign Up</a>
            <select class="bg-gray-700 text-white p-2 rounded">
                <option value="en">English</option>
                <option value="id">Bahasa Indonesia</option>
            </select>
        </div>
    </div>

    <!-- Mobile Nav (Dropdown) -->
    <div id="mobile-nav" 
     class="hidden flex-col bg-white text-black rounded-b-[20px] shadow-md absolute top-16 left-0 right-0 w-full px-6 py-4 transition-all duration-500 ease-in-out opacity-0 transform scale-y-0 origin-top">
    <ul class="space-y-4 text-center">
        <li><a href="index.html" class="font-semibold hover:text-red-400 block">Sign In</a></li>
        <li><a href="howitworks.html" class="font-semibold hover:text-red-400 block">How It Works</a></li>
        <li><a href="#howitworks" class="font-semibold hover:text-red-400 block">Services</a></li>
        <li><a href="/register" class="font-semibold hover:text-red-400 block">Sign Up</a></li>
        <li>
            <select class="bg-gray-700 text-white p-2 rounded w-full">
                <option value="en">English</option>
                <option value="id">Bahasa Indonesia</option>
            </select>
        </li>
    </ul>

</nav>

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
</script>