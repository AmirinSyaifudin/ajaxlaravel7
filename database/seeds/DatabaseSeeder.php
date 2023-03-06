<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(MemberTableSeeder::class);
        $this->call(KaprodiTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
    }
}