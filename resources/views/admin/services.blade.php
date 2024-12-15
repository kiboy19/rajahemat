<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-white font-sans">
    <div class="flex min-h-screen">
      <x-adminsidebar></x-adminsidebar>
      <!-- Main Content -->
      <div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
        <!-- Hamburger Menu -->
        <div class="flex justify-between items-center mb-6 md:hidden">
          <h1 class="text-xl font-bold">Service</h1>
          <button id="hamburger" class="text-white bg-blue-800 p-2 rounded-lg">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <div class="bg-white p-6 rounded shadow">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold mb-4">Filter</h2>

            <div class="bg-white p-6 rounded shadow">
              <label>Filter</label>
              <select name="category" id="category">
                <option value="">Semua Kategori</option>
              </select>
            </div>

            <div class="bg-white p-6 rounded shadow">
              <label>Sortir</label>
              <select name="sort" id="sort">
                <option value="">Default</option>
                <option value="price_asc">Harga Termurah</option>
                <option value="price_desc">Harga Termahal</option>
              </select>
            </div>

            <div class="bg-white p-6 rounded shadow">
              <label for="search">Cari...</label>
              <input
                type="text"
                name="search"
                id="search"
                class="form-control"
                placeholder="Ketik untuk mencari"
                value=""
              />
            </div>

            <a class="text-white bg-blue-800 p-2 rounded-lg" href="#"
              >Service</a
            >
          </div>

          <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100 text-left">
                  <th class="p-4">ID</th>
                  <th class="p-4">Layanan</th>
                  <th class="p-4">Tipe</th>
                  <th class="p-4">Kategory</th>
                  <th class="p-4">Harga/K</th>
                  <th class="p-4">Min</th>
                  <th class="p-4">Maks</th>
                  <th class="p-4">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-t">
                  <td class="p-4">1</td>
                  <td class="p-4">Layanan A</td>
                  <td class="p-4">Tipe A</td>
                  <td class="p-4">Kategori A</td>
                  <td class="p-4">Rp.50,000</td>
                  <td class="p-4">10</td>
                  <td class="p-4">1000</td>
                  <td class="p-4">
                    <button
                      class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                    >
                      Edit
                    </button>
                    <button
                      class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    >
                      Hapus
                    </button>
                  </td>
                </tr>
                <tr class="border-t">
                  <td class="p-4">2</td>
                  <td class="p-4">Layanan B</td>
                  <td class="p-4">Tipe B</td>
                  <td class="p-4">Kategori B</td>
                  <td class="p-4">Rp.30,000</td>
                  <td class="p-4">5</td>
                  <td class="p-4">500</td>
                  <td class="p-4">
                    <button
                      class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                    >
                      Edit
                    </button>
                    <button
                      class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    >
                      Hapus
                    </button>
                  </td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai kebutuhan -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
