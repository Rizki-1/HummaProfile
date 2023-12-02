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
            'tentang' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nibh velit, fermentum at diam ut, placerat ultrices nibh. Aenean rutrum hendrerit velit in sagittis. Duis viverra eget lacus sed consequat. Mauris vitae massa non est suscipit dictum. Duis sed lorem nisl. Nam finibus suscipit ante nec congue. Donec neque libero, tincidunt at ullamcorper eget, ornare vel purus. Morbi vel blandit libero. Morbi accumsan interdum tincidunt. Sed in bibendum massa.

            Morbi consequat purus vel porttitor luctus. Sed a congue quam. Sed vestibulum lorem non nulla interdum varius. Aliquam tempus ex et hendrerit aliquam. Integer maximus blandit aliquet. Nunc nec velit libero. Suspendisse pharetra luctus nisi, laoreet interdum nisi faucibus at. Aliquam velit turpis, ultricies vel elit sed, laoreet consectetur sapien. Ut eu tincidunt leo, ut consectetur nunc. Donec at sem vitae quam sagittis pulvinar. Donec ac elit ex. Etiam enim mi, placerat vel diam sit amet, efficitur pretium massa. Morbi in est in turpis bibendum placerat eget in erat. Vestibulum ac nisl lacinia, consequat tellus quis, fermentum elit. Nunc tempus magna ac neque fringilla congue. Vivamus maximus non eros accumsan gravida.",
            'alamat' => 'Perum Permata Regency 1 Blok 10/28, Perun Gpa, Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152',
            'no_telp' => '+62 851 7677 7785',
            'email' => 'hummaprofile@gmail.com',
        ]);
    }
}
