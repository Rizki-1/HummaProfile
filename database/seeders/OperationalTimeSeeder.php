<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use App\Models\OperationalTime;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperationalTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu',
        ];

        $repeat = 0;
        foreach ($days as $day) {
            $message = null; $status = 1;
            if ($repeat >= 5) {
                $status = 0;
                $message = 'libur mingguan';
            }
            $repeat += 1;

            OperationalTime::create([
                'day' => $day,
                'open' => Carbon::parse('08:00:00')->toTimeString(),
                'close' => Carbon::parse('16:00:00')->toTimeString(),
                'status' => $status,
                'message' => $message,
            ]);
        }
    }
}
