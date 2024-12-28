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
</body>
</html>
