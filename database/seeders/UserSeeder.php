<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Maruan Aguilar Avila',
            'email' => 'maruan123trabajo@gmail.com',
            'password' =>bcrypt('12345678')
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
