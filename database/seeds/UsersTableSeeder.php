<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Benjamim Thiago',
            'email' => 'ben@teste.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
