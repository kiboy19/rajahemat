<!-- Sidebar -->
<div id="sidebar"
    class="bg-red-600 text-white w-64 p-4 fixed top-0 left-0 h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="flex flex-col items-center">
        <img alt="Profile picture of user" class="rounded-full mb-4 border-4 border-white" height="100"
            src="https://storage.googleapis.com/a1aa/image/rCuhRAHjGKYwIt1CPLNqSJmx5oYXcfRXYhXJz1ahXIdK8D9JA.jpg"
            width="100" />
        <h2 class="text-xl font-semibold mb-4">admin</h2>
    </div>
    <nav class="space-y-2">
        <a class="block py-2 px-4 {{ Request::is('admin/dashboard') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="/admin/dashboard">Home</a>
        <a class="block py-2 px-4 {{ Request::is('admin/services') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="/admin/services">Service</a>
        <a class="block py-2 px-4 {{ Request::is('logout') ? 'bg-blue-800' : 'hover:bg-blue-700' }} rounded-lg transition"
            href="/logout">Logout</a>
    </nav>

</div>
