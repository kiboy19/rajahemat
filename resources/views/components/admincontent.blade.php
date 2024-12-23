@props(['admin', 'totalUsers', 'users'])

<div class="flex-1 p-6 ml-0 md:ml-64 transition-all">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Status Account</p>
            <h2 class="text-2xl font-bold">{{ ucfirst($admin->role) }}</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total Balance</p>
            <h2 class="text-2xl font-bold">-</h2>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Total Users</p>
            <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
        </div>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">List Users</h2>
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            <a href="#" class="text-blue-500">Edit</a> |
                            <a href="#" class="text-red-500">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
