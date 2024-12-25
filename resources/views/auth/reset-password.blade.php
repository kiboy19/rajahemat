<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Navbar -->
    <x-navbar></x-navbar>

    <!-- Reset Password Form -->
    <div class="container mx-auto mt-10 max-w-md bg-white border border-gray-200 shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>
        
        <!-- Display Errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                <input type="password" id="password" name="password" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:outline-none">
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
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
