<x-user-layout :title="'Services'">
  @section('content')
    <h1>Services</h1>
  @endsection

  <div class="relative min-h-screen">
    <!-- Sidebar -->
    <x-sidebardashboard :userName="$user->name"></x-sidebardashboard>
    
    <div class="flex justify-between items-center mb-6 p-4 md:hidden">
      <h1 class="text-xl font-bold">Services</h1>
      <button id="hamburger"
          class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
          <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Main Content -->
    <main id="main-content" class="p-4 lg:p-8 transition-all duration-300 ease-in-out md:ml-64">

      <!-- Search and Filter -->
      <x-services-content-searchfilter :Category="$categories"></x-services-content-searchfilter>

      <!-- Table -->
      <x-services-content-table :Services="$services"></x-services-content-table>
    </main>
  </div>

  <script>
    // Live search function
    const searchInput = document.querySelector("input[name='search']");
    const categorySelect = document.querySelector("select[name='category']");
    const searchButton = document.querySelector("button[type='submit']");
    let timeout = null;

    // Update the URL search params and trigger the search
    function triggerSearch() {
      const searchValue = searchInput.value;
      const categoryValue = categorySelect.value;

      // Update the page's query string dynamically
      let url = new URL(window.location.href);
      if (searchValue) url.searchParams.set('search', searchValue);
      if (categoryValue) url.searchParams.set('category', categoryValue);
      
      window.location.href = url;
    }

    // Event listener for live search (delay to avoid excess calls)
    searchInput.addEventListener('input', function() {
      clearTimeout(timeout);
      timeout = setTimeout(triggerSearch, 500); // Delay by 500ms
    });

    // Event listener for category change
    categorySelect.addEventListener('change', triggerSearch);

    // Event listener for manual search button
    searchButton.addEventListener('click', function(e) {
      e.preventDefault();
      triggerSearch();
    });
  </script>
</x-user-layout>
