<!-- resources/views/categories/edit.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Edit Kategori</h1>

        <!-- Menampilkan Pesan Error -->
        <x-alert />

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
