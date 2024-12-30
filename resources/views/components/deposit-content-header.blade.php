@props(['user'])

<div class="flex flex-col sm:flex-row items-center sm:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-semibold text-center sm:text-left">Hi {{ $user->name }}</h1>
        <p class="text-gray-500 text-center sm:text-left">Saldo Anda: Rp {{ number_format($user->saldo, 0, ',', '.') }}</p>
        <p class="text-gray-500 text-center sm:text-left">Pilih metode pembayaran yang diinginkan!</p>
    </div>
</div>
