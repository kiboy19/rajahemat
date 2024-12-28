@props(['Services'])
<div class="overflow-x-auto bg-white rounded-lg shadow-lg">
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-red-900 text-white">
            <tr>
              <th class="px-4 py-2 border">ID</th>
              <th class="px-4 py-2 border">Service</th>
              <th class="px-4 py-2 border">Type</th>
              <th class="px-4 py-2 border">Category</th>
              <th class="px-4 py-2 border">Price/K</th>
              <th class="px-4 py-2 border">Min</th>
              <th class="px-4 py-2 border">Max</th>
              <th class="px-4 py-2 border">Description</th>
            </tr>
        </thead>
        <tbody>
          @forelse($services as $service)
              <tr class="bg-red-100">
                  <td class="px-4 py-2 border">{{ $service->id }}</td>
                  <td class="px-4 py-2 border text-center">{{ $service->name }}</td>
                  <td class="px-4 py-2 border">{{ ucfirst($service->type) }}</td>
                  <td class="px-4 py-2 border">{{ $service->category->name ?? '-' }}</td>
                  <td class="px-4 py-2 border">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                  <td class="px-4 py-2 border">{{ $service->min }}</td>
                  <td class="px-4 py-2 border text-center">{{ $service->max }}</td>
                  <td class="px-4 py-2 border text-center">{{ $service->description }}</td>
              </tr>
          @empty
              <tr>
                  <td colspan="8" class="text-center p-4">Layanan tidak tersedia</td>
              </tr>
          @endforelse
      </tbody>
      
    </table>
    <div class="flex justify-center mt-3">
      {{ $services->links() }}
  </div>
</div>
