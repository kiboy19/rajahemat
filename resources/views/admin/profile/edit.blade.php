{{-- resources/views/admin/profile/edit.blade.php --}}
<x-admin-layout>
    <x-adminsidebar :adminName="$admin->name" />

    <div class="ml-64 p-6">
        <h1 class="text-2xl font-semibold mb-6">Edit Profile</h1>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="max-w-md">
            @csrf

            {{-- Avatar --}}
            <div class="mb-4">
                <label class="block text-gray-700">Avatar</label>
                <div class="flex items-center">
                    <img src="{{ $admin->avatar_url }}" alt="Avatar" class="w-20 h-20 rounded-full mr-4">
                    <input type="file" name="avatar" accept="image/*"
                        class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100
                    ">
                </div>
                @error('avatar')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-6">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                Update Profile
            </button>
        </form>
    </div>
</x-admin-layout>
