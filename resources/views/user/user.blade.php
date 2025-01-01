<x-user-layout :title="'Dashboard'">
  @section('content')
    <h1>Dashboard</h1>
  @endsection
  <div class="flex min-h-screen">
    <x-sidebardashboard :userName="$user->name"></x-sidebardashboard>
    <x-contentdashboard :user="$user" :services="$services"></x-contentdashboard>
  </div>
</x-user-layout>
