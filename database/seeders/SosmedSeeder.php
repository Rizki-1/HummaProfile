<?php

namespace Database\Seeders;

use App\Models\Sosmed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSosmed = [
            [
                'profile_company_id' => 1,
                'name' => 'youtube',
                'link' => 'https://www.youtube.com/channel/UC6q0IEGPdbd8-iRRaeZjYqw',
            ],
            [
                'profile_company_id' => 1,
                'name' => 'instagram',
                'link' => 'https://www.instagram.com/hummatech/',
            ],
            [
                'profile_company_id' => 1,
                'name' => 'facebook',
                'link' => 'https://www.facebook.com/hummatech',
            ],
            [
                'profile_company_id' => 1,
                'name' => 'twitter',
                'link' => 'https://twitter.com/hummasoft',
            ],
            [
                'profile_company_id' => 1,
                'name' => 'linkedin',
                'link' => 'https://www.linkedin.com/company/cv-hummasoft-komputindo/',
            ],
        ];

        Sosmed::insert($dataSosmed);
    }
}
