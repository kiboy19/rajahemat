@props(['adminName' => 'Admin'])
<div id="sidebar"
    class="bg-red-600 text-white w-64 p-4 fixed top-0 left-0 h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex flex-col items-center">
        <img alt="Profile picture of user" class="rounded-full mb-4 border-4 border-white" height="100"
            src="{{ Auth::user()->avatar_url }}" width="100" />
        <h2 class="text-xl font-semibold mb-4">{{ $adminName }}</h2>
    </div>
    <nav class="space-y-2">
        <a class="block py-2 px-4 {{ Request::is('admin/dashboard') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="{{ route('admin.dashboard') }}">Home</a>
        <a class="block py-2 px-4 {{ Request::is('admin/services') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="{{ route('admin.services.index') }}">Service</a>
        <a class="block py-2 px-4 {{ Request::is('admin/history') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="{{ route('admin.history') }}">History</a>
        <a class="block py-2 px-4 {{ Request::is('admin/tambahsaldo') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="{{ route('admin.tambahsaldo.form') }}">Tambah Saldo</a>
        <a class="block py-2 px-4 {{ Request::is('admin/profile/edit') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="{{ route('admin.profile.edit') }}">Edit Profile</a>
        <a class="block py-2 px-4 {{ Request::is('logout') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="/logout">Logout</a>
    </nav>
</div>
