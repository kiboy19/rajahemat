<x-user-layout :title="'History'">
  @section('content')
      <h1>History</h1>
  @endsection

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


          <!-- Scrollable Table -->
          <div id="ordersTable">
              @include('user.partials.orders-table', ['orders' => $orders])
          </div>
      </main>
  </div>


</x-user-layout>
