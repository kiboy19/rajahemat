<x-user-layout>
  <div class="flex min-h-screen">
    <x-sidebardashboard :userName="$user->name"></x-sidebardashboard>
    <x-contentdashboard :user="$user"></x-contentdashboard>
  </div>
</x-user-layout>
