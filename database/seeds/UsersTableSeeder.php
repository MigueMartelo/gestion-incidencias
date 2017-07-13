<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::create([
        	'name' => 'Miguel Martelo',
        	'email' => 'miguel@utbvirtual.edu.co',
        	'password' => bcrypt('123456'),
        	'role' => 0
        ]);

        // Support
        User::create([
        	'name' => 'Ana Fernandez',
        	'email' => 'ana.fernandez@gmail.com',
        	'password' => bcrypt('123456'),
        	'role' => 1
        ]);

        // Client
        User::create([
        	'name' => 'Leslie Quiroz',
        	'email' => 'leslie@gmail.com',
        	'password' => bcrypt('123456'),
        	'role' => 2
        ]);
    }
}
