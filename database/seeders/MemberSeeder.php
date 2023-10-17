<?php

namespace Database\Seeders;

use App\Models\MemberModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberModel::create([
            'nama_perusahaan' => 'test',
            'email_perusahaan' => 'test',
            'nama_kontak_person' => 'test',
            'no_telepon_person' => '121212',
            'no_telepon_perusahaan' => '121212',
            'id_kategori_perusahaan' => 2,
            'alamat_perusahaan' => 'test',
            'latitude' => 'test',
            'longitude' => 'test',
            
            'gambar_perusahaan' => 'test',
            'level' => 'pd',
            'username' => 'kominfo',
            'password' => Hash::make('admin1234'),
        ]);

        MemberModel::create([
            'nama_perusahaan' => 'test',
            'email_perusahaan' => 'test',
            'nama_kontak_person' => 'test',
            'no_telepon_person' => '121212',
            'no_telepon_perusahaan' => '121212',
            'id_kategori_perusahaan' => 2,
            'alamat_perusahaan' => 'test',
            'latitude' => 'test',
            'longitude' => 'test',
            
            'gambar_perusahaan' => 'test',
            'level' => 'pd',
            'username' => 'dprd',
            'password' => Hash::make('admin1234'),
        ]);

        MemberModel::create([
            'nama_perusahaan' => 'test',
            'email_perusahaan' => 'test',
            'nama_kontak_person' => 'test',
            'no_telepon_person' => 'test',
            'no_telepon_perusahaan' => 'test',
            'id_kategori_perusahaan' => 2,
            'alamat_perusahaan' => 'test',
            'latitude' => 'test',
            'longitude' => 'test',
            
            'gambar_perusahaan' => 'test',
            'level' => 'cp',
            'username' => 'haudy',
            'password' => Hash::make('admin1234'),
        ]);

        MemberModel::create([
            'nama_perusahaan' => 'test',
            'email_perusahaan' => 'test',
            'nama_kontak_person' => 'test',
            'no_telepon_person' => 'test',
            'no_telepon_perusahaan' => 'test',
            'id_kategori_perusahaan' => 2,
            'alamat_perusahaan' => 'test',
            'latitude' => 'test',
            'longitude' => 'test',
            
            'gambar_perusahaan' => 'test',
            'level' => 'cp',
            'username' => 'haudy2',
            'password' => Hash::make('admin1234'),
        ]);
    }
}
