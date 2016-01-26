<?php

use Illuminate\Database\Seeder;
use App\Shift;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShiftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prev_week_date = Carbon::now();
        $cur_week_date  = Carbon::now();
        // Let's build 2 weeks worth of data from current date (for better testing)
        // We'll use the previous 5 days from current day and the current day + 5 days
        $schedule = [
            1 => [ // Regular day 9-5
                'date'       => $prev_week_date->subDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            2 => [ // Regular day 9-5
                'date'       => $prev_week_date->subDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            3 => [ // Regular day 9-5
                'date'       => $prev_week_date->subDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            4 => [ // Short day (9-12)
                'date'       => $prev_week_date->subDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '12:00:00',
            ],
            5 => [ // Regular day 9-5
                'date'       => $prev_week_date->subDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            6 => [ // Regular day 9-5
                'date'       => $cur_week_date->addDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            7 => [ // Regular day 9-5
                'date'       => $cur_week_date->addDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            8 => [ // Regular day 9-5
                'date'       => $cur_week_date->addDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
            9 => [ // Short day (9-12)
                'date'       => $cur_week_date->addDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '12:00:00',
            ],
            10 => [ // Regular day 9-5
                'date'       => $cur_week_date->addDay()->toDateString(),
                'start_time' => '09:00:00',
                'end_time'   => '15:00:00',
            ],
        ];

        // Hardcoded ids that match existing data
        $employee1_id = 1;
        $employee2_id = 2;
        $manager_id  = 2;

        // Remove all old seed data
        DB::table('shifts')->delete();

        // Making shift for manager 1, employee 1
        $this->makeShift($schedule, 2, $employee1_id);
        // Making shift for manager 1, employee 2
        $this->makeShift($schedule, 2, $employee2_id);
    }
    /*
     * Creates schedule resource
     */
    protected function makeShift($schedule, $manager_id, $employee_id) {
        foreach($schedule as $shift) {
            $shift['start_time'] = $shift['date'].' '.$shift['start_time'];
            $shift['end_time']   = $shift['date'].' '.$shift['end_time'];
            Shift::create([
                'employee_id'=> $employee_id,
                'manager_id' => $manager_id,
                'start_time' => $shift['start_time'],
                'end_time'   => $shift['end_time'],
            ]);
        }
    }
}
