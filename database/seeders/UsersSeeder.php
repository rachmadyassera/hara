<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => Str::uuid(),
            'name' => 'Rachmad Yasser Al Zuhri',
            'role' => 'admin',
            'email' => 'developer@siakra.go.id',
            'password' => bcrypt('081279329132')
        ]);
    }
}
