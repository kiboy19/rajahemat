<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      overflow-x: hidden;
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="relative min-h-screen">
    <!-- Sidebar -->
    <x-sidebardashboard></x-sidebardashboard>

    <!-- Main Content -->
    <main id="main-content" class="p-4 lg:p-8 transition-all duration-300 ease-in-out md:ml-64">
      <!-- Hamburger Menu -->
      <div class="flex justify-between items-center mb-6 md:hidden">
        <h1 class="text-xl font-bold">Services</h1>
        <button id="hamburger" class="text-white bg-red-900 p-2 rounded-lg">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <!-- Categories -->
      <x-services-content-category></x-services-content-category>

      <!-- Search and Filter -->
      <x-services-content-searchfilter></x-services-content-searchfilter>

      <!-- Table -->
      <x-services-content-table></x-services-content-table>
    </main>
  </div>

  <script>
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");
  
    // Fungsi untuk menyembunyikan sidebar di layar kecil
    function updateSidebarVisibility() {
      if (window.innerWidth < 768) {
        sidebar.classList.add("left-[-100%]"); // Menyembunyikan sidebar pada layar kecil
        sidebar.classList.remove("left-0"); // Pastikan sidebar tidak terlihat
      } else {
        sidebar.classList.remove("left-[-100%]"); // Menampilkan sidebar pada layar besar
        sidebar.classList.add("left-0");
      }
    }
  
    // Cek ukuran layar saat halaman pertama kali dimuat
    document.addEventListener("DOMContentLoaded", () => {
      updateSidebarVisibility();
    });
  
    // Update visibilitas sidebar setiap kali ukuran layar berubah
    window.addEventListener("resize", updateSidebarVisibility);
  
    // Event untuk hamburger menu pada layar kecil
    hamburger.addEventListener("click", () => {
      if (window.innerWidth < 768) {
        sidebar.classList.toggle("left-[-100%]"); // Toggle sidebar untuk ukuran layar kecil
        sidebar.classList.toggle("left-0");
      }
    });
  </script>
  
</body>
</html>
