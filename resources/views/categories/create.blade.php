<!-- resources/views/categories/create.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Tambah Kategori Baru</h1>

        <!-- Menampilkan Pesan Error -->
        <x-alert />

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Kategori" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
