<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-white font-sans">
    <div class="flex min-h-screen">
      <x-adminsidebar></x-adminsidebar>
      <x-admincontent></x-admincontent>

    </div>

    <script>
      const hamburger = document.getElementById("hamburger");
      const sidebar = document.getElementById("sidebar");

      hamburger.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        sidebar.classList.toggle("translate-x-0");
      });
    </script>
  </body>
</html>
