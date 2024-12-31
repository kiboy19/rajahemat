<x-admin-layout>
    <div class="relative min-h-screen">
        <!-- Sidebar -->
        <x-adminsidebar :adminName="$admin->name" id="sidebar"
            class="md:translate-x-0 -translate-x-full fixed md:static top-0 left-0 h-screen w-64 bg-red-600 transition-transform duration-300"></x-adminsidebar>
        <div class="flex justify-between items-center mb-6 p-4 md:hidden">
            <h1 class="text-xl font-bold">History Orders</h1>
            <button id="hamburger"
                class="text-white bg-red-600 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Main Content -->
        <main id="main-content" class="flex-1 lg:ml-64 p-4 lg:p-8 transition-all duration-300 ease-in-out">
            <!-- Search Bar -->
            <x-history-content-searchbar></x-history-content-searchbar>

            <!-- Status Buttons -->
            <x-history-content-statusbtn></x-history-content-statusbtn>

            <!-- Scrollable Table -->
            <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
                <table class="w-full min-w-[900px]">
                    <thead class="bg-red-900 text-white">
                        <tr>
                          <th class="py-3 px-4 text-center">ID</th>
                          <th class="py-3 px-4 text-center">User</th>
                          <th class="py-3 px-4 text-center">Tanggal</th>
                          <th class="py-3 px-4 text-center">Link</th>
                          <th class="py-3 px-4 text-center">Harga</th>
                          <th class="py-3 px-4 text-center">Jumlah</th>
                          <th class="py-3 px-4 text-center">Layanan</th>
                          <th class="py-3 px-4 text-center">Status</th>
                          <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td class="py-3 px-4 text-center">{{ $order->id }}</td>
                            <td class="py-3 px-4 text-center">{{ $order->user->name }}</td>
                            <td class="py-3 px-4 text-center">{{ $order->created_at->format('Y-m-d') }}</td>
                            <td class="py-3 px-4 text-center">
                              <a href="{{ $order->link }}" target="_blank" class="text-blue-500 underline">{{ parse_url($order->link, PHP_URL_HOST) }}</a>
                            </td>
                            <td class="py-3 px-4 text-center">Rp {{ number_format($order->price, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">{{ $order->quantity }}</td>
                            <td class="py-3 px-4 text-center">{{ $order->service->name }}</td>
                            <td class="py-3 px-4 text-center capitalize">{{ $order->status }}</td>
                            <td class="py-3 px-4 text-center">
                                @if($order->status === 'pending')
                                    <form action="{{ route('admin.order.process', $order->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Process</button>
                                    </form>
                                    <form action="{{ route('admin.order.cancel', $order->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Cancel</button>
                                    </form>
                                @elseif($order->status === 'processing')
                                    <form action="{{ route('admin.order.complete', $order->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Complete</button>
                                    </form>
                                    <form action="{{ route('admin.order.cancel', $order->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Cancel</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="py-3 px-4 text-center">Tidak ada pemesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $orders->links('pagination::tailwind') }}
            </div>
        </main>
    </div>
</x-admin-layout>
