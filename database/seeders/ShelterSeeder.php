<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('shelters')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'nama' => 'Kandang A', 'kode' => 'SH-001', 'alamat' => 'Surabaya', 'status' => '1', 'user_id' => 2, 'image' => 'shelter-ARSG.png'
            ],
            [
                'nama' => 'Kandang B', 'kode' => 'SH-002', 'alamat' => 'Malang', 'status' => '1', 'user_id' => 2, 'image' => 'shelter-ARSG.png'
            ],
            [
                'nama' => 'Kandang C', 'kode' => 'SH-003', 'alamat' => 'Madiun', 'status' => '1', 'user_id' => 3, 'image' => 'shelter-ARSG.png'
            ],
            [
                'nama' => 'Kandang D', 'kode' => 'SH-004', 'alamat' => 'Denpasar', 'status' => '1', 'user_id' => 3, 'image' => 'shelter-ARSG.png'
            ],
        ];

        DB::table('shelters')->insert($data);
    }
}
