<?php

namespace Database\Seeders;

use App\Models\Mou;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MouSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mouData = [
            ['foto_mou' => 'smk-1.png', 'nama_mou' => 'Smk 17 Agustus 1945 Muncar'],
            ['foto_mou' => 'smk-2.jpg', 'nama_mou' => 'Smk Muhammadiyah 2 Gambiran'],
            ['foto_mou' => 'smk-3.jpg', 'nama_mou' => 'Smk negeri 1 Probolinggo'],
            ['foto_mou' => 'smk-4.jpg', 'nama_mou' => 'Smk Al-Azhar banyuwangi'],
            ['foto_mou' => 'smk-5.jpg', 'nama_mou' => 'Smk Muhammadiyyah 6 rogojampi'],
            ['foto_mou' => 'smk-6.jpg', 'nama_mou' => 'Smk Muhammadiyyah 4 boyolali'],
            ['foto_mou' => 'smk-7.jpg', 'nama_mou' => 'Smk Kepanjen 1 malang'],
            ['foto_mou' => 'smk-8.png', 'nama_mou' => 'Smk negeri 1 keraksan'],
            ['foto_mou' => 'smk-9.png', 'nama_mou' => 'Smk Muhammadiyyah 1 Genteng'],
            ['foto_mou' => 'smk-10.jpg', 'nama_mou' => 'Smk'],
            ['foto_mou' => 'smk-11.png', 'nama_mou' => 'BBPPMPV BOE Malang'],
        ];

        foreach ($mouData as $data) {
            Mou::create($data);
        }
    }
}
