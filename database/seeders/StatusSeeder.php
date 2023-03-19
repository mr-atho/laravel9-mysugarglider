<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->truncate();
        $data = [
            [
                'keterangan' => '0. Disable, Mati',
            ],
            [
                'keterangan' => '1. Aktif',
            ],
            [
                'keterangan' => '2. Hidup tidak diadopsi',
            ],
            [
                'keterangan' => '3. Hidup diadopsi',
            ],
            [
                'keterangan' => '4. Tidak Terpilih',
            ],
            [
                'keterangan' => '5. Terpilih - Pembayaran',
            ],
            [
                'keterangan' => '6. Terpilih - Pengiriman',
            ],
            [
                'keterangan' => '7. Terpilih - Terima',
            ],
            [
                'keterangan' => '8. Selesai',
            ],
        ];

        DB::table('statuses')->insert($data);
    }
}
