<x-user-layout>
  <div class="flex min-h-screen relative">
    <!-- Sidebar -->
    <x-sidebardashboard :userName="$user->name"></x-sidebardashboard>
    <!-- Main Content -->
    <div id="main-content" class="flex-1 md:ml-64 p-4 lg:p-8 transition-transform duration-300 ease-in-out">
      <div class="flex justify-between items-center mb-6 p-4 md:hidden">
        <h1 class="text-xl font-bold">Deposit User</h1>
        <button id="hamburger"
            class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
            <i class="fas fa-bars"></i>
        </button>
      </div>
      <!-- Header Section -->
      <x-deposit-content-header></x-deposit-content-header>

      <!-- Payment Section -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
        <!-- Payment Method Column -->
        <x-deposit-content-paymentcolumn></x-deposit-content-paymentcolumn>

        <!-- Special Offers Column -->
        <x-deposit-content-specialoffer></x-deposit-content-specialoffer>
      </div>
    </div>
  </div>
</x-user-layout>
