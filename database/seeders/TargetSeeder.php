<?php

namespace Database\Seeders;

use App\Models\TargetLayanan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $target = [
            'Magang / Pkl',
            'Kelas Industry',
        ];

        foreach ($target as $t) {
            TargetLayanan::create([
                'target' => $t,
            ]);
        }
    }
}
