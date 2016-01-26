<?php

use Illuminate\Database\Seeder;
use App\Shift;
use Illuminate\Support\Facades\DB;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = [
            1 => [ // Regular day 9-5
                'start_time' => '2016-01-25 09:00:00',
                'end_time'   => '2016-01-25 15:00:00',
            ],
            2 => [ // Regular day 9-5
                'start_time' => '2016-01-26 09:00:00',
                'end_time'   => '2016-01-26 15:00:00',
            ],
            3 => [ // Regular day 9-5
                'start_time' => '2016-01-27 09:00:00',
                'end_time'   => '2016-01-27 15:00:00',
            ],
            4 => [ // Short day (9-12)
                'start_time' => '2016-01-28 09:00:00',
                'end_time'   => '2016-01-28 12:00:00',
            ],
            5 => [ // Regular day 9-5
                'start_time' => '2016-01-29 09:00:00',
                'end_time'   => '2016-01-29 15:00:00',
            ],
        ];

        // Hardcoded ids that match existing data
        $employee_id = 1;
        $manager_id  = 2;

        // Remove all old seed data
        DB::table('shifts')->delete();

        // Create Fake shifts
        foreach($schedule as $shift) {
            Shift::create([
                'employee_id'=> $employee_id,
                'manager_id' => $manager_id,
                'start_time' => $shift['start_time'],
                'end_time'   => $shift['end_time'],
            ]);
        }
    }
}
