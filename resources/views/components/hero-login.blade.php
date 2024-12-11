<div class="min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 sm:px-8 md:px-12 lg:px-20">
        <div class="flex flex-col lg:flex-row items-center bg-red-900 overflow-hidden space-y-6 lg:space-y-0 lg:space-x-6">
            <!-- Left Column -->
            <div class="lg:w-1/2 p-8 text-white text-center flex flex-col justify-center">
                <h1 class="text-4xl font-bold mb-4">Join Us Today!</h1>
                <p class="text-lg mb-6">Unlock exclusive features and enjoy a seamless experience. Sign up now to get started!</p>
                <a href="/daftar" class="bg-green-600 text-white font-bold py-3 px-6 rounded-md hover:bg-gray-200 hover:text-black transition">
                    Sign Up Now
                </a>
            </div>
            <!-- Right Column -->
            <div class="lg:w-1/2 p-8 w-full">
                <div class="bg-red-900 border border-red-900 rounded-[20px] shadow-[0px_4px_20px_rgba(0,0,0,0.50)] p-6">
                    <h2 class="text-2xl font-bold mb-4 text-white">Login</h2>
                    <form>
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="block text-white mb-2">Email</label>
                            <input type="email" id="email" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter your username" required>
                        </div>
                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="block text-white mb-2">Password</label>
                            <input type="password" id="password" class="w-full p-3 border rounded-md focus:ring focus:ring-blue-300" placeholder="Enter your password" required>
                        </div>
                        <!-- Forgot Password -->
                        <div class="mb-4 text-right">
                            <a href="#forgot-password" class="text-white hover:text-blue-500">Forgot Password?</a>
                        </div>
                        <!-- Submit Button -->
                        <div class="mb-4">
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-gray-200 hover:text-black transition">
                                Sign In
                            </button>
                        </div>
                        <!-- Sign Up Link -->
                        <div class="text-center">
                            <p class="text-white">
                                Do not have an account? 
                                <a href="/daftar" class="text-white hover:text-blue-500">Sign Up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>