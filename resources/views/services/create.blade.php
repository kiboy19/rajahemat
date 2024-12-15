<!-- resources/views/services/create.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Tambah Layanan Baru</h1>

        <!-- Menampilkan Pesan Error -->
        <x-alert />

        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id" class="form-label">ID Layanan</label>
                <input type="number" name="id" class="form-control" placeholder="Masukkan ID Layanan" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Layanan</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Layanan" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipe Layanan</label>
                <select name="type" class="form-select" required>
                    <option value="">Pilih Tipe Layanan</option>
                    <option value="default">Default</option>
                    <option value="package">Package</option>
                    <option value="custom_comment">Custom Comment</option>
                    <option value="comment_likes">Comment Likes</option>
                    <option value="mention_list">Mention List</option>
                    <option value="mention_hastag">Mention Hastag</option>
                    <option value="mention_follower">Mention Follower</option>
                    <option value="mention_media">Mention Media</option>
                    <option value="poll">Poll</option>
                    <option value="comment_reply">Comment Reply</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" name="price" class="form-control" placeholder="Masukkan Harga" required>
            </div>

            <div class="mb-3">
                <label for="min" class="form-label">Minimum Order</label>
                <input type="number" name="min" class="form-control" placeholder="Masukkan Minimum Order" required>
            </div>

            <div class="mb-3">
                <label for="max" class="form-label">Maximum Order</label>
                <input type="number" name="max" class="form-control" placeholder="Masukkan Maximum Order" required>
            </div>

            <div class="mb-3">
                <label for="refill" class="form-label">Refill</label>
                <select name="refill" class="form-select" required>
                    <option value="">Pilih Refill</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi (Opsional)" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
