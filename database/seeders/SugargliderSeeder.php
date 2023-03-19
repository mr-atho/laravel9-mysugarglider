<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SugargliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('sugargliders')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'kode' => 'ARSG-A001', 'nama' => 'Sugar Glider 1', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A002', 'nama' => 'Sugar Glider 2', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A003', 'nama' => 'Sugar Glider 3', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A004', 'nama' => 'Sugar Glider 4', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A005', 'nama' => 'Sugar Glider 5', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A006', 'nama' => 'Sugar Glider 6', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A007', 'nama' => 'Sugar Glider 7', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A008', 'nama' => 'Sugar Glider 8', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A009', 'nama' => 'Sugar Glider 9', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A010', 'nama' => 'Sugar Glider 10', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A011', 'nama' => 'Sugar Glider 11', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A012', 'nama' => 'Sugar Glider 12', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A013', 'nama' => 'Sugar Glider 13', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A014', 'nama' => 'Sugar Glider 14', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A015', 'nama' => 'Sugar Glider 15', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A016', 'nama' => 'Sugar Glider 16', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '0', 'indukan_jantan' => '0', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A017', 'nama' => 'Sugar Glider 17', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '2', 'indukan_jantan' => '1', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A018', 'nama' => 'Sugar Glider 18', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '4', 'indukan_jantan' => '3', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A019', 'nama' => 'Sugar Glider 19', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '6', 'indukan_jantan' => '5', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A020', 'nama' => 'Sugar Glider 20', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '8', 'indukan_jantan' => '7', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A021', 'nama' => 'Sugar Glider 21', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '10', 'indukan_jantan' => '9', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A022', 'nama' => 'Sugar Glider 22', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '12', 'indukan_jantan' => '11', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A023', 'nama' => 'Sugar Glider 23', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '14', 'indukan_jantan' => '13', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A024', 'nama' => 'Sugar Glider 24', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '16', 'indukan_jantan' => '15', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A025', 'nama' => 'Sugar Glider 25', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '18', 'indukan_jantan' => '17', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A026', 'nama' => 'Sugar Glider 26', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '20', 'indukan_jantan' => '19', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A027', 'nama' => 'Sugar Glider 27', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '22', 'indukan_jantan' => '21', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A028', 'nama' => 'Sugar Glider 28', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '24', 'indukan_jantan' => '23', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A029', 'nama' => 'Sugar Glider 29', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '26', 'indukan_jantan' => '25', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A030', 'nama' => 'Sugar Glider 30', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '28', 'indukan_jantan' => '27', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A031', 'nama' => 'Sugar Glider 31', 'kelamin' => '1', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '30', 'indukan_jantan' => '29', 'user_id' => '2'
            ],
            [
                'kode' => 'ARSG-A032', 'nama' => 'Sugar Glider 32', 'kelamin' => '0', 'oop' => '2022-01-01', 'warna' => 'Classic Grey', 'jenis' => 'Classic Grey het Leucistic',
                'genetika' => '100% Leucistic', 'fenotype' => "Warna grey", 'indukan_betina' => '30', 'indukan_jantan' => '29', 'user_id' => '2'
            ],
        ];

        DB::table('sugargliders')->insert($data);
    }
}
