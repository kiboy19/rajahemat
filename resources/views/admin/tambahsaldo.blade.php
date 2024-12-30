<x-admin-layout>
    <x-adminsidebar :adminName="$admin->name"></x-adminsidebar>
    <div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Saldo</h1>
        <form action="{{ route('admin.tambahsaldo') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf

            <!-- Select User -->
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih User</label>
                <select name="user_id" id="user_id" class="w-full p-2 border rounded-lg bg-gray-200">
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input Jumlah Saldo -->
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Saldo</label>
                <input type="number" name="amount" id="amount" min="1" class="w-full p-2 border rounded-lg bg-gray-200" placeholder="Masukkan jumlah saldo">
                @error('amount')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-green-500 text-white font-medium rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Tambah Saldo
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
