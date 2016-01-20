<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            1 => [
                'name' => 'John Employee',
                'role' => 'employee',
                'email' => 'employee1@example.com',
                'password' => bcrypt('demo'),
                'phone'    => '555-555-5551',
            ],
            2 => [
                'name' => 'Joe Manager',
                'role' => 'manager',
                'email' => 'manager@example.com',
                'password' => bcrypt('demo'),
                'phone'    => '555-555-5552',
            ],
            3 => [
                'name' => 'Jake Employee',
                'role' => 'employee',
                'email' => 'employee2@example.com',
                'password' => bcrypt('demo'),
                'phone'    => '555-555-5553',
            ],
        ];

        // Remove all old seed data
        DB::table('users')->delete();

        // Create Fake users
        foreach($users as $key => $user) {
            User::create(
                $user
            );
        }
    }
}
