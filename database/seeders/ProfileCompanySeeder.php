<?php

namespace Database\Seeders;

use App\Models\ProfileCompany;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileCompany::create([
            'tentang' => "HummaTech merupakan sebuah perusahaan yang bergerak dibidang IT (Information Technology) yang memiliki beberapa divisi layanan, diantaranya: Software Development (Website Application, Desktop Application, and Mobile Application), IT Course, IT Training, IT Research, and IT Services.",
            'alamat' => 'Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152',
            'no_telp' => '0885176777785',
            'email' => 'hummaprofile@gmail.com',
        ]);
    }
}
