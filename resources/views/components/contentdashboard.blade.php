@props(['user', 'services'])
<!-- Main Content -->
<div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
  <div class="flex justify-between items-center mb-6 p-4 md:hidden">
    <h1 class="text-xl font-bold">Dashboard User</h1>
    <button id="hamburger"
        class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
        <i class="fas fa-bars"></i>
    </button>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-gray-200 p-4 rounded-lg">
      <p>Saldo</p>
      <p class="text-xl font-bold">Rp {{ number_format($user->saldo, 0, ',', '.') }}</p>
    </div>
  </div>

  <!-- Form Pemesanan Layanan -->
  <div class="bg-white p-6 rounded-lg mb-6">
    <h3 class="text-lg font-bold mb-4">Pesan Layanan</h3>
    <form action="{{ route('user.order.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-2" for="service_id">Layanan</label>
            <select name="service_id" id="service_id" class="w-full p-2 border rounded-lg" required>
                <option value="">Pilih Layanan</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" data-min="{{ $service->min }}" data-max="{{ $service->max }}">
                        {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('service_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <!-- Keterangan Min dan Max -->
        <div id="order-info" class="mb-4 text-sm text-gray-700">
            <!-- Akan diisi oleh JavaScript -->
        </div>
        <div class="mb-4">
            <label class="block mb-2" for="link">Link Akun</label>
            <input type="url" name="link" id="link" class="w-full p-2 border rounded-lg" placeholder="https://example.com/username" required>
            @error('link')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-2" for="quantity">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="w-full p-2 border rounded-lg" min="1" required>
            @error('quantity')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-red-900 text-white py-2 px-4 rounded-lg">Pesan</button>
    </form>
  </div>
</div>

<!-- Tambahkan Script untuk Update Keterangan Min dan Max -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const serviceSelect = document.getElementById('service_id');
      const orderInfo = document.getElementById('order-info');
      const quantityInput = document.getElementById('quantity');
      const form = document.querySelector('form');

      let currentMin = 1;
      let currentMax = Infinity;

      serviceSelect.addEventListener('change', function() {
          const selectedOption = this.options[this.selectedIndex];
          const min = parseInt(selectedOption.getAttribute('data-min'));
          const max = parseInt(selectedOption.getAttribute('data-max'));

          if (!isNaN(min) && !isNaN(max)) {
              orderInfo.textContent = `Minimal Pemesanan: ${min} | Maksimal Pemesanan: ${max}`;
              currentMin = min;
              currentMax = max;
              quantityInput.setAttribute('min', min);
              quantityInput.setAttribute('max', max);
          } else {
              orderInfo.textContent = '';
              currentMin = 1;
              currentMax = Infinity;
              quantityInput.setAttribute('min', 1);
              quantityInput.removeAttribute('max');
          }
      });

      form.addEventListener('submit', function(e) {
          const quantity = parseInt(quantityInput.value);
          if (quantity < currentMin) {
              e.preventDefault();
              alert('Jumlah yang anda pesan kurang dari minimal pemesanan.');
          }
          if (quantity > currentMax) {
              e.preventDefault();
              alert('Jumlah yang anda pesan melebihi batas maksimal pemesanan.');
          }
      });
  });
</script>