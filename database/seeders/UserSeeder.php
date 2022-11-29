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
        $superadmin = User::create([
            'first' => 'superadmin',
            'last' => 'testes',
            'username' => 'superadmin',
            'email' => 'superadmin@test.test',
            'password' => bcrypt('admin123'),

        ]);

        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'first' => 'admin',
            'last' => 'testes',
            'username' => 'admin',
            'sections_id' => '1',
            'email' => 'admin@test.test',
            'password' => bcrypt('admin123'),

        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'first' => 'farrel',
            'last' => 'testes',
            'username' => 'farrelmaahira',
            'email' => 'farrel@gmail.com',
            'sections_id' => 2,
            'gender' => 'men',
            'password' => bcrypt('admin123'),

        ]);

        $user->assignRole('user');
    }
}
