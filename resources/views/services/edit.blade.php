<!-- resources/views/services/edit.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Edit Layanan</h1>

        <!-- Menampilkan Pesan Error -->
        <x-alert />

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id" class="form-label">ID Layanan</label>
                <input type="number" name="id" class="form-control" value="{{ $service->id }}" readonly>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Layanan</label>
                <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipe Layanan</label>
                <select name="type" class="form-select" required>
                    <option value="">Pilih Tipe Layanan</option>
                    <option value="default" {{ $service->type == 'default' ? 'selected' : '' }}>Default</option>
                    <option value="package" {{ $service->type == 'package' ? 'selected' : '' }}>Package</option>
                    <option value="custom_comment" {{ $service->type == 'custom_comment' ? 'selected' : '' }}>Custom
                        Comment</option>
                    <option value="comment_likes" {{ $service->type == 'comment_likes' ? 'selected' : '' }}>Comment
                        Likes</option>
                    <option value="mention_list" {{ $service->type == 'mention_list' ? 'selected' : '' }}>Mention List
                    </option>
                    <option value="mention_hastag" {{ $service->type == 'mention_hastag' ? 'selected' : '' }}>Mention
                        Hastag</option>
                    <option value="mention_follower" {{ $service->type == 'mention_follower' ? 'selected' : '' }}>
                        Mention Follower</option>
                    <option value="mention_media" {{ $service->type == 'mention_media' ? 'selected' : '' }}>Mention
                        Media</option>
                    <option value="poll" {{ $service->type == 'poll' ? 'selected' : '' }}>Poll</option>
                    <option value="comment_reply" {{ $service->type == 'comment_reply' ? 'selected' : '' }}>Comment
                        Reply</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $service->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga (Rp)</label>
                <input type="number" name="price" class="form-control" value="{{ $service->price }}" required>
            </div>

            <div class="mb-3">
                <label for="min" class="form-label">Minimum Order</label>
                <input type="number" name="min" class="form-control" value="{{ $service->min }}" required>
            </div>

            <div class="mb-3">
                <label for="max" class="form-label">Maximum Order</label>
                <input type="number" name="max" class="form-control" value="{{ $service->max }}" required>
            </div>

            <div class="mb-3">
                <label for="refill" class="form-label">Refill</label>
                <select name="refill" class="form-select" required>
                    <option value="">Pilih Refill</option>
                    <option value="1" {{ $service->refill ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$service->refill ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
