 <!-- Main Content -->
 <div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
      <!-- Hamburger Menu -->
      <div class="flex justify-between items-center mb-6 md:hidden">
        <h1 class="text-xl font-bold">Dashboard</h1>
        <button id="hamburger" class="text-white bg-red-900 p-2 rounded-lg">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-gray-200 p-4 rounded-lg">
          <p>Saldo</p>
          <p class="text-xl font-bold">Rp 10.000</p>
        </div>
        <div class="bg-gray-200 p-4 rounded-lg">
          <p>Total Spending</p>
          <p class="text-xl font-bold">Rp 100.000</p>
        </div>
        <div class="bg-gray-200 p-4 rounded-lg">
          <p>Account Points</p>
          <p class="text-xl font-bold">200</p>
        </div>
        <div class="bg-gray-200 p-4 rounded-lg">
          <p>Account Balance</p>
          <p class="text-xl font-bold">0</p>
        </div>
      </div>

      <div class="bg-gray-200 p-6 rounded-lg mb-6">
        <h3 class="text-lg font-bold mb-4">Select Category</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <div class="category bg-white p-4 rounded-lg flex items-center justify-center hover:bg-gray-200 transition duration-300 cursor-pointer" data-category="Instagram Followers">
            <img alt="Instagram logo" class="mr-2" height="50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/600px-Instagram_icon.png" width="50"/>
            <span>Instagram</span>
          </div>
          <div class="category bg-white p-4 rounded-lg flex items-center justify-center hover:bg-gray-200 transition duration-300 cursor-pointer" data-category="TikTok Followers">
            <img alt="TikTok logo" class="mr-2" height="50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Ionicons_logo-tiktok.svg/512px-Ionicons_logo-tiktok.svg.png" width="50"/>
            <span>TikTok</span>
          </div>
          <div class="category bg-white p-4 rounded-lg flex items-center justify-center hover:bg-gray-200 transition duration-300 cursor-pointer" data-category="Youtube Subscribers">
            <img alt="YouTube logo" class="mr-2" height="50" src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Youtube_logo.png" width="50"/>
            <span>YouTube</span>
          </div>
          <div class="category bg-white p-4 rounded-lg flex items-center justify-center hover:bg-gray-200 transition duration-300 cursor-pointer" data-category="Spotify Followers">
            <img alt="Spotify logo" class="mr-2" height="50" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Spotify_logo_without_text.svg/168px-Spotify_logo_without_text.svg.png" width="50"/>
            <span>Spotify</span>
          </div>
        </div>
      </div>

      <div class="bg-white p-6 rounded-lg">
        <div class="mb-4">
          <div class="relative">
            <input class="w-full p-2 border rounded-lg" placeholder="Search" type="text"/>
            <i class="fas fa-search absolute top-2 right-2 text-gray-500"></i>
          </div>
        </div>
        <div class="mb-4">
          <label class="block mb-2" for="category">Category</label>
          <select class="w-full p-2 border rounded-lg" id="category">
            <option>Instagram Followers</option>
            <option>TikTok Followers</option>
            <option>Youtube Subscribers</option>
            <option>Spotify Followers</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block mb-2" for="category">Service</label>
          <select class="w-full p-2 border rounded-lg" id="category">
            <option>Instagram Followers S-66 | Maks: 5M | High-Quality | Real | Low Drop | AR30 | 50K/Days</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block mb-2" for="link">Link</label>
          <input class="w-full p-2 border rounded-lg" id="link" type="text"/>
        </div>
        <div class="mb-4">
          <label class="block mb-2" for="quantity">Quantity</label>
          <input class="w-full p-2 border rounded-lg" id="quantity" type="text"/>
        </div>
      </div>
    </div>