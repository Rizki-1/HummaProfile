<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TargetLayanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "Admin",
            "email"=> "hummaprofile@gmail.com",
            "password"=> Hash::make('admin-ini'),
        ]);
    }
}
