<!-- resources/views/categories/index.blade.php -->

<x-app-layout>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Tombol Menambahkan Kategori Baru -->
        <a href="{{ route('categories.create') }}" class="btn btn-success">Tambah Kategori Baru</a>
    </div>

    <!-- Daftar Kategori Menggunakan Komponen -->
    @foreach ($categories as $category)
        <div class="mb-3">
            <h4>{{ $category->name }}</h4>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
            </form>
        </div>
    @endforeach
</x-app-layout>
