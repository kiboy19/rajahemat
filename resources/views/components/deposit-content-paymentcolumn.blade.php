<div class="bg-gray-300 p-4 rounded-lg">
    <label for="paymentMethod" class="block text-gray-700 mb-2">Payment Method</label>
    <select id="paymentMethod" class="w-full p-2 border rounded-lg bg-gray-200 mb-4">
        <option value="shopeepay">ShopeePay</option>
        <option value="dana">DANA</option>
        <option value="ovo">OVO</option>
        <option value="gopay">GoPay</option>
        <option value="paypal">PayPal</option>
        <option value="applepay">Apple Pay</option>
    </select>

    <div class="flex flex-wrap gap-2 mb-4">
        <button class="bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="updatePrice(10000)">Rp 10,000</button>
        <button class="bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="updatePrice(50000)">Rp 50,000</button>
        <button class="bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="updatePrice(100000)">Rp 100,000</button>
        <button class="bg-red-900 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="updatePrice(500000)">Rp 500,000</button>
    </div>

    <label for="priceInput" class="block text-gray-700 mb-2">Amount</label>
    <input id="priceInput" type="number" class="w-full p-2 border rounded-lg bg-gray-200 mb-4" placeholder="Masukkan jumlah harga" />

    <button class="bg-green-700 text-white w-full p-2 rounded-lg hover:bg-green-800">Submit</button>
</div>


