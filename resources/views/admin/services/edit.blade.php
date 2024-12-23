<x-admin-layout>
    <!-- Konten Utama -->
    <div class="flex-1 p-4 md:p-6 ml-0 md:ml-64 transition-all">
        <!-- Tombol Hamburger (Hanya muncul di layar kecil) -->
        <div class="flex justify-between items-center mb-6 md:hidden">
            <h1 class="text-xl font-bold">Edit Layanan</h1>
            <button id="hamburger"
                class="text-white bg-blue-800 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Card Container -->
        <div class="bg-white p-4 md:p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-6">Edit Layanan</h2>

            <!-- Menampilkan Pesan Error (opsional) -->
            @if (session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Edit Layanan -->
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- ID Layanan -->
                <div>
                    <label for="id" class="block font-semibold mb-1">ID Layanan</label>
                    <input type="number" name="id" id="id"
                        class="w-full border border-gray-300 rounded p-2" value="{{ $service->id }}" readonly />
                </div>

                <!-- Nama Layanan -->
                <div>
                    <label for="name" class="block font-semibold mb-1">Nama Layanan</label>
                    <input type="text" name="name" id="name"
                        class="w-full border border-gray-300 rounded p-2" value="{{ old('name', $service->name) }}"
                        required />
                </div>

                <!-- Tipe Layanan -->
                <div>
                    <label for="type" class="block font-semibold mb-1">Tipe Layanan</label>
                    <select name="type" id="type" class="w-full border border-gray-300 rounded p-2" required>
                        <option value="">Pilih Tipe Layanan</option>
                        <option value="default" {{ $service->type == 'default' ? 'selected' : '' }}>Default</option>
                        <option value="package" {{ $service->type == 'package' ? 'selected' : '' }}>Package</option>
                        <option value="custom_comment" {{ $service->type == 'custom_comment' ? 'selected' : '' }}>
                            Custom Comment
                        </option>
                        <option value="comment_likes" {{ $service->type == 'comment_likes' ? 'selected' : '' }}>
                            Comment Likes
                        </option>
                        <option value="mention_list" {{ $service->type == 'mention_list' ? 'selected' : '' }}>
                            Mention List
                        </option>
                        <option value="mention_hastag" {{ $service->type == 'mention_hastag' ? 'selected' : '' }}>
                            Mention Hastag
                        </option>
                        <option value="mention_follower" {{ $service->type == 'mention_follower' ? 'selected' : '' }}>
                            Mention Follower
                        </option>
                        <option value="mention_media" {{ $service->type == 'mention_media' ? 'selected' : '' }}>
                            Mention Media
                        </option>
                        <option value="poll" {{ $service->type == 'poll' ? 'selected' : '' }}>Poll</option>
                        <option value="comment_reply" {{ $service->type == 'comment_reply' ? 'selected' : '' }}>
                            Comment Reply
                        </option>
                    </select>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category_id" class="block font-semibold mb-1">Kategori</label>
                    <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded p-2"
                        required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Harga (Rp) -->
                <div>
                    <label for="price" class="block font-semibold mb-1">Harga (Rp)</label>
                    <input type="number" name="price" id="price"
                        class="w-full border border-gray-300 rounded p-2" value="{{ old('price', $service->price) }}"
                        required />
                </div>

                <!-- Minimum Order -->
                <div>
                    <label for="min" class="block font-semibold mb-1">Minimum Order</label>
                    <input type="number" name="min" id="min"
                        class="w-full border border-gray-300 rounded p-2" value="{{ old('min', $service->min) }}"
                        required />
                </div>

                <!-- Maximum Order -->
                <div>
                    <label for="max" class="block font-semibold mb-1">Maximum Order</label>
                    <input type="number" name="max" id="max"
                        class="w-full border border-gray-300 rounded p-2" value="{{ old('max', $service->max) }}"
                        required />
                </div>

                <!-- Refill -->
                <div>
                    <label for="refill" class="block font-semibold mb-1">Refill</label>
                    <select name="refill" id="refill" class="w-full border border-gray-300 rounded p-2" required>
                        <option value="">Pilih Refill</option>
                        <option value="1" {{ $service->refill ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ !$service->refill ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="description" class="block font-semibold mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded p-2">{{ old('description', $service->description) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center gap-4 mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition-colors">
                        Perbarui
                    </button>
                    <a href="{{ route('admin.services.index') }}"
                        class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600 transition-colors">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
