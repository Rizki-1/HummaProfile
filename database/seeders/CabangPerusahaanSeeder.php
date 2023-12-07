<?php

namespace Database\Seeders;

use App\Models\CabangPerusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabangPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CabangPerusahaan::create([
            'name' => 'Pusat Perusahaan',
            'latitude' => -7.900074,
            'longitude' => 112.606886
        ]);
    }
}
