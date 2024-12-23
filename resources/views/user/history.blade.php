<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders</title>
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
    <main id="main-content" class="flex-1 lg:ml-64 p-4 lg:p-8 transition-all duration-300 ease-in-out">
      <!-- Hamburger Menu -->
      <div class="flex justify-between items-center mb-6 md:hidden">
        <h1 class="text-xl font-bold">Order History</h1>
        <button id="hamburger" class="text-white bg-red-900 p-2 rounded-lg">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <!-- Search Bar -->
      <x-history-content-searchbar></x-history-content-searchbar>

      <!-- Status Buttons -->
      <x-history-content-statusbtn></x-history-content-statusbtn>

      <!-- Scrollable Table -->
      <x-history-content-table></x-history-content-table>
    </main>
  </div>

  <script>
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");
  
    // Fungsi toggle sidebar ketika tombol hamburger diklik
    hamburger.addEventListener("click", () => {
      sidebar.classList.toggle("-translate-x-full");
    });
  
    // Event listener untuk mendeteksi perubahan ukuran layar
    window.addEventListener("resize", () => {
      if (window.innerWidth >= 1024) {
        // Pastikan sidebar tetap terlihat pada ukuran desktop
        sidebar.classList.remove("-translate-x-full");
      } else {
        // Sembunyikan sidebar secara default di ukuran mobile
        sidebar.classList.add("-translate-x-full");
      }
    });
  
    // Pastikan sidebar dalam status yang benar saat halaman pertama kali dimuat
    document.addEventListener("DOMContentLoaded", () => {
      if (window.innerWidth < 1024) {
        sidebar.classList.add("-translate-x-full");
      }
    });
  </script>
  
</body>
</html>
