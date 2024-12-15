<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">
    <x-sidebardashboard></x-sidebardashboard>
    <x-contentdashboard></x-contentdashboard>
  </div>

  <script>
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const categories = document.querySelectorAll('.category');
    const categorySelect = document.getElementById('category');

    hamburger.addEventListener('click', () => {
      if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
      } else {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
      }
    });

    categories.forEach(category => {
      category.addEventListener('click', () => {
        const selectedCategory = category.getAttribute('data-category');
        categorySelect.value = selectedCategory;
      });
    });
  </script>
</body>
</html>
