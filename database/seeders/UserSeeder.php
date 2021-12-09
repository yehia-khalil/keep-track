<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'yehia',
            'email'    => 'yehia.khalil3@gmail.com',
            'password' => '12345678',
            'isAdmin'  => 1
        ]);
    }
}
