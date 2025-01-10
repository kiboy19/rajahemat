<div class="overflow-x-auto bg-white rounded-lg shadow-lg">
    <table class="w-full min-w-[900px]">
        <thead class="bg-red-900 text-white">
            <tr>
                <th class="py-3 px-4 text-center">ID</th>
                <th class="py-3 px-4 text-center">User</th>
                <th class="py-3 px-4 text-center">Tanggal</th>
                <th class="py-3 px-4 text-center">Link</th>
                <th class="py-3 px-4 text-center">Biaya</th>
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
                <td class="py-3 px-4 text-center">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
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
