@props(['userName'])

<!-- Sidebar -->
<div id="sidebar"
    class="bg-red-900 text-white w-64 p-4 fixed top-0 left-0 h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex flex-col items-center">
        @auth
            <img alt="Profile picture of user" class="rounded-full mb-4" height="100"
                src="{{ auth()->user()->avatar_url }}" width="100" />
            <h2 class="text-xl mb-4">{{ auth()->user()->name }}</h2>
        @else
            <img alt="Default profile picture" class="rounded-full mb-4" height="100"
                src="{{ asset('images/default-avatar.png') }}" width="100" />
            <h2 class="text-xl mb-4">{{ $userName }}</h2>
        @endauth
    </div>
    <nav class="space-y-2">
        <a class="block py-2 px-4 {{ request()->is('user/user') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('user.showSaldo') }}">Dashboard User</a>
        <a class="block py-2 px-4 {{ request()->is('user/history') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('user.history') }}">History Order</a>
        <a class="block py-2 px-4 {{ request()->is('user/deposit') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('user.depositForm') }}">Deposit</a>
        <a class="block py-2 px-4 {{ request()->is('user/services') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('user.services.index') }}">Services</a>
        <a class="block py-2 px-4 {{ request()->is('user/profile/edit') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('user.profile.edit') }}">Edit Profile</a>
        <a class="block py-2 px-4 {{ request()->is('logout') ? 'bg-red-800' : 'hover:bg-red-700' }} rounded-lg"
            href="{{ route('logout') }}">Logout</a>
    </nav>
</div>
