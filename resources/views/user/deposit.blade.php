<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Deposit</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen relative">
    <!-- Sidebar -->
    <x-sidebardashboard></x-sidebardashboard>

    <!-- Main Content -->
    <div id="main-content" class="flex-1 md:ml-64 p-4 lg:p-8 transition-transform duration-300 ease-in-out">
      <!-- Hamburger Menu -->
      <div class="flex justify-between items-center mb-6 md:hidden">
        <h1 class="text-xl font-bold">Deposit</h1>
        <button id="hamburger" class="text-white bg-red-900 p-2 rounded-lg">
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
  <script>
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("main-content");

    hamburger.addEventListener("click", () => {
      if (sidebar.classList.contains("-translate-x-full")) {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");
      } else {
        sidebar.classList.remove("translate-x-0");
        sidebar.classList.add("-translate-x-full");
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 768) {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");
      } else {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");
      }
    });

    function updatePrice(amount) {
      const priceInput = document.getElementById("priceInput");
      priceInput.value = amount;
    }
  </script>
</body>
</html>
