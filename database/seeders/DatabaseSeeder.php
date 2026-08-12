<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'      => 'Super Admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);

        User::create([
            'name'      => 'Kepala Gudang',
            'email'     => 'kepalagudang@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        User::create([
            'name'      => 'Admin Gudang',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 3
        ]);

        Supplier::create([
            'supplier'      => 'PT Hanstd',
            'alamat'        => 'Ds. Jleper, Kec. Mijèn, Kab. Demak, 03/05
Phone: +62 821-3518-1255
Website: https://inventory.hanstd.com',
            'user_id'       => 1
        ]);
        
        Role::create([
            'role'      => 'superadmin',
            'deskripsi' => 'Superadmin memiliki kendali penuh pada aplikasi termasuk manajemen User'
        ]);

        Role::create([
            'role'      => 'kepala gudang',
            'deskripsi' => 'Kepala gudang memilki akses untuk mengelola dan mencetak laporan stok, barang masuk, dan barang keluar'
        ]);

        Role::create([
            'role'      => 'admin gudang',
            'deskripsi' => 'Admin gudang memilki akses untuk mengelola stok,  barang masuk, barang keluar dan laporannya'
        ]);
     
    }
}
