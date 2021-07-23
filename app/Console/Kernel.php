<?php

namespace App\Console;

use App\Models\MileStone;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // gets all exercises in workouts
            $result = DB::table('exercises_workouts')->select('exercise_id')->groupby('exercise_id')->get();
            $result = json_decode($result, true);
            // looping over every exercise, i should get the max reps and weight
            //but first i have to create a milestones
            $date = Carbon::now()->toDateString();
            $milestone = MileStone::create(['date'=>$date]);
            foreach ($result as $res) {
                $maxWeight =  DB::table('exercises_workouts')->where('exercise_id', $res['exercise_id'])->max('weight');
                $maxReps =  DB::table('exercises_workouts')->where('exercise_id', $res['exercise_id'])->max('repititions');
                echo $maxReps,$maxWeight;
                $milestone->exercises()->attach($res['exercise_id'], ['max_reps_per_set'=>$maxReps,'one_rep_max'=>$maxWeight, 'date'=>$date]);
            }
        })->everyMinute();
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
