<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Program;
use App\Models\Lulusan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "hanafi";
        $user->email = "hanafi@mail.com";
        $user->password = bcrypt('admin');
        $user->save();

        $jenis = new Program;
        $jenis->jenis = "Kejar Paket A";
        $jenis->save();

        $jenis1 = new Program;
        $jenis1->jenis = "Kejar Paket B";
        $jenis1->save();

        $jenis2 = new Program;
        $jenis2->jenis = "Kejar Paket C";
        $jenis2->save();

        $lulusan = new Lulusan;
        $lulusan->nama = "Belum Pernah Bersekolah";
        $lulusan->deskripsi = "Belum Pernah Bersekolah";
        $lulusan->save();

        $lulusan1 = new Lulusan;
        $lulusan1->nama = "SD/Sederajat";
        $lulusan1->deskripsi = "SD/Sederajat";
        $lulusan1->save();

        $lulusan2 = new Lulusan;
        $lulusan2->nama = "SMP/Sederajat";
        $lulusan2->deskripsi = "SMP/Sederajat";
        $lulusan2->save();
    }
}
