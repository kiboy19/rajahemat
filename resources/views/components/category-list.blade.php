<!-- resources/views/components/category-list.blade.php -->

<div class="mb-4">
    <h3>{{ $category->name }}</h3>
    @if ($category->services->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Layanan</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Min</th>
                    <th>Max</th>
                    <th>Refill</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ ucfirst($service->type) }}</td>
                        <td>Rp. {{ number_format($service->price, 2, ',', '.') }}</td>
                        <td>{{ $service->min }}</td>
                        <td>{{ $service->max }}</td>
                        <td>{{ $service->refill ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak ada layanan untuk kategori ini.</p>
    @endif
</div>
