<x-user-layout>
  <div class="relative min-h-screen">
    <!-- Sidebar -->
    <x-sidebardashboard :userName="$user->name"></x-sidebardashboard>
    <div class="flex justify-between items-center mb-6 p-4 md:hidden">
      <h1 class="text-xl font-bold">History Orders</h1>
      <button id="hamburger"
          class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
          <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Main Content -->
    <main id="main-content" class="flex-1 lg:ml-64 p-4 lg:p-8 transition-all duration-300 ease-in-out">

      <!-- Search Bar -->
      <x-history-content-searchbar></x-history-content-searchbar>

      <!-- Status Buttons -->
      <x-history-content-statusbtn></x-history-content-statusbtn>

      <!-- Scrollable Table -->
      <x-history-content-table></x-history-content-table>
    </main>
  </div>
</x-user-layout>