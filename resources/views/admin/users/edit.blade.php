<x-admin-layout>
    <x-adminsidebar :adminName="$admin->name"></x-adminsidebar>

    <div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit User</h1>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                    placeholder="Enter user name" aria-label="Name">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}"
                    class="block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                    placeholder="Enter user email" aria-label="Email">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Saldo Input -->
            <div class="mb-4">
                <label for="saldo" class="block text-sm font-medium text-gray-700 mb-2">Saldo</label>
                <input type="number" name="saldo" id="saldo" value="{{ $user->saldo }}"
                    class="block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-gray-700"
                    placeholder="Enter user saldo" aria-label="Saldo">
                @error('saldo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white font-medium rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
