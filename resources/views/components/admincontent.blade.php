@props(['admin', 'totalUsers', 'users'])

<div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
    <!-- Pesan Flash -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
            {{ session('error') }}
        </div>
    @endif

    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Status Account</p>
            <h2 class="text-2xl font-bold">{{ ucfirst($admin->role) }}</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total Balance</p>
            <h2 class="text-2xl font-bold">Rp {{ number_format($admin->saldo, 0, ',', '.') }}</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total Users</p>
            <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
        </div>
    </div>

    <!-- List Users -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">List Users</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Saldo
                        </th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-700 text-sm">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-700 text-sm">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-gray-700 text-sm">Rp {{ number_format($user->saldo, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-gray-700 text-sm">
                                <div class="flex items-center space-x-4">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="text-blue-500 hover:text-blue-700 flex items-center">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 flex items-center">
                                            <i class="fas fa-trash mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada pengguna ditemukan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6 flex justify-end">
        <a href="{{ route('admin.users.exportPdf') }}"
            class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
            <i class="fas fa-download mr-2"></i>Download Laporan PDF
        </a>
    </div>

</div>
