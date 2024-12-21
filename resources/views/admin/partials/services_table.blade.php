<!-- resources/views/admin/partials/services_table.blade.php -->

<table class="w-full table-auto border-collapse text-sm md:text-base">
    <thead class="bg-gray-100 text-left">
        <tr>
            <th class="p-2 md:p-4">ID</th>
            <th class="p-2 md:p-4">Layanan</th>
            <th class="p-2 md:p-4">Tipe</th>
            <th class="p-2 md:p-4">Kategori</th>
            <th class="p-2 md:p-4">Harga/K</th>
            <th class="p-2 md:p-4">Min</th>
            <th class="p-2 md:p-4">Max</th>
            <th class="p-2 md:p-4">Deskripsi</th>
            <th class="p-2 md:p-4">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($services as $service)
            <tr class="border-t">
                <td class="p-2 md:p-4">{{ $service->id }}</td>
                <td class="p-2 md:p-4">{!! $service->name !!}</td>
                <td class="p-2 md:p-4">{{ ucfirst($service->type) }}</td>
                <td class="p-2 md:p-4">
                    {{ $service->category->name ?? '-' }}
                </td>
                <td class="p-2 md:p-4">
                    Rp {{ number_format($service->price, 0, ',', '.') }}
                </td>
                <td class="p-2 md:p-4">{{ $service->min }}</td>
                <td class="p-2 md:p-4">{{ $service->max }}</td>
                <td class="p-2 md:p-4">
                    {{ $service->description }}
                </td>
                <td class="p-2 md:p-4">
                    <a href="{{ route('admin.services.edit', $service->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 inline-block mb-1">
                        Edit
                    </a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                        class="inline-block" onsubmit="return confirm('Yakin?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center p-4">Tidak ada data layanan ditemukan.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="flex justify-center mt-3">
    {{ $services->links() }}
</div>