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
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">
  @if(session('success'))
    <div class="fixed top-0 right-0 m-4 p-4 bg-green-500 text-white rounded-lg fade-in">
      {{ session('success') }}
    </div>
  @endif
  @if(session('error'))
    <div class="fixed top-0 right-0 m-4 p-4 bg-red-500 text-white rounded-lg fade-in">
      {{ session('error') }}
    </div>
  @endif
{{ $slot }}
<!-- Script untuk Toggle Sidebar -->
<script>
  const hamburger = document.getElementById("hamburger");
  const sidebar = document.getElementById("sidebar");

  hamburger.addEventListener("click", () => {
      // Toggle kelas agar sidebar bisa muncul / sembunyi
      sidebar.classList.toggle("-translate-x-full");
  });
</script>
    <!-- Script untuk Toggle Sidebar -->
    <script>
        const hamburger = document.getElementById("hamburger");
        const sidebar = document.getElementById("sidebar");

        hamburger.addEventListener("click", () => {
            // Toggle kelas agar sidebar bisa muncul / sembunyi
            sidebar.classList.toggle("-translate-x-full");
        });
    </script>
</body>
</html>
