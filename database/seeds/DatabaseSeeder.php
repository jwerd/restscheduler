<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Turn off FK checks so we can work with our data and not get errors
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Generate Users
        $this->call(UserTableSeeder::class);
        $this->command->info('User table seeded!');
        // Generate Shifts
        $this->call(ShiftTableSeeder::class);
        $this->command->info('Shift table seeded!');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
