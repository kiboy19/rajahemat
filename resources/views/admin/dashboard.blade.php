<x-admin-layout>
    <x-adminsidebar :adminName="$admin->name" id="sidebar"
        class="md:translate-x-0 -translate-x-full fixed md:static top-0 left-0 h-screen w-64 bg-red-600 transition-transform duration-300"></x-adminsidebar>
    <x-admincontent :admin="$admin" :totalUsers="$totalUsers" :users="$users"></x-admincontent>
</x-admin-layout>
