<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\SmmNusantaraFetcher;

class SmmNusantaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fetcher = new SmmNusantaraFetcher();
        $result = $fetcher->fetchAndStoreServices();

        if (!$result['status']) {
            // Jika ingin menampilkan pesan error di console
            $this->command->error($result['message']);
        } else {
            $this->command->info($result['message']);
        }
    }
}
