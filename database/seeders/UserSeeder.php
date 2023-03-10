<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('users')->insert(['name' => 'Super Admin', 'email' => 'sa@mysugarglider.id', 'email_verified_at' => '2022-01-01 00:005:00', 'password' => '$2y$10$JegtCblb6yTkHa0YDSMhz.87tUZno2YySf./KutC.aNV3HOwuKZjm', 'avatar' => 'avatar-1.png', 'status' => 1]);
        DB::table('users')->insert(['name' => 'Atho Simatupang', 'email' => 'mr.fightto@gmail.com', 'email_verified_at' => '2022-01-01 00:005:00', 'password' => '$2y$10$JegtCblb6yTkHa0YDSMhz.87tUZno2YySf./KutC.aNV3HOwuKZjm', 'avatar' => 'avatar-1.png', 'status' => 1]);
        DB::table('users')->insert(['name' => 'User 3', 'email' => 'user3@mysugarglider.id', 'email_verified_at' => '2022-01-01 00:005:00', 'password' => '$2y$10$JegtCblb6yTkHa0YDSMhz.87tUZno2YySf./KutC.aNV3HOwuKZjm', 'avatar' => 'avatar-1.png', 'status' => 1]);
        DB::table('users')->insert(['name' => 'User 4', 'email' => 'user4@mysugarglider.id', 'email_verified_at' => '2022-01-01 00:005:00', 'password' => '$2y$10$JegtCblb6yTkHa0YDSMhz.87tUZno2YySf./KutC.aNV3HOwuKZjm', 'avatar' => 'avatar-1.png', 'status' => 1]);
    }
}
