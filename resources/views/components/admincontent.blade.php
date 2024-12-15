      <!-- Main Content -->
      <div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
        <!-- Hamburger Menu -->
        <div class="flex justify-between items-center mb-6 md:hidden">
          <h1 class="text-xl font-bold">Dashboard</h1>
          <button id="hamburger" class="text-white bg-blue-800 p-2 rounded-lg">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
          <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Status Account</p>
            <h2 class="text-2xl font-bold">Admin</h2>
            <a href="#" class="text-blue-500 mt-4 inline-block"
              >Information Account</a
            >
          </div>
          <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total Balance</p>
            <h2 class="text-2xl font-bold">$89,000</h2>
            <a href="#" class="text-blue-500 mt-4 inline-block">Deposit</a>
          </div>
          <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total User</p>
            <h2 class="text-2xl font-bold">2</h2>
          </div>
        </div>

        <div class="bg-white p-6 rounded shadow">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold mb-4">List Users</h2>
            <input
              id="search-input"
              type="text"
              onkeyup="searchTable()"
              placeholder="Search for users..."
              class="border border-gray-300 rounded px-4 py-2"
            />
          </div>
          <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100 text-left">
                  <th class="p-4">Name</th>
                  <th class="p-4">Email</th>
                  <th class="p-4">Balance</th>
                  <th class="p-4">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-t">
                  <td class="p-4">Jamal</td>
                  <td class="p-4">Lorem ipsum dolor sit amet</td>
                  <td class="p-4">Rp.30,000</td>
                </tr>
                <tr class="border-t">
                  <td class="p-4">Burhan</td>
                  <td class="p-4">Lorem ipsum dolor sit amet</td>
                  <td class="p-4">Rp.30,000</td>
                </tr>
                <!-- More rows as needed -->
              </tbody>
            </table>
          </div>
        </div>
      </div>