@props(['Category'])
<div class="flex flex-col md:flex-row items-center justify-between mb-6">
    <form method="GET" action="{{ url('/user/services') }}" class="w-full">
        <div class="flex items-center space-x-2 w-full">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                class="border border-gray-300 rounded-full p-2 flex-grow" 
                placeholder="Search by Name or ID" 
            />
            <select name="category" class="bg-gray-300 text-black px-4 py-2 rounded-full ml-2 md:ml-4 w-full md:w-auto">
                <option value="">Kategori</option>
                @foreach ($Category as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded-full">Search</button>
        </div>
    </form>
</div>
