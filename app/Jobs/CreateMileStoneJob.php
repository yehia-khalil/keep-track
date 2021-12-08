<?php

namespace App\Jobs;

use App\Models\MileStone;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CreateMileStoneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // gets all exercises in workouts for each user
        $users     = User::all();
        foreach ($users as $user) {
            $exercises = DB::table('workouts')
                           ->join('exercises_workouts', 'workouts.id', '=', 'exercises_workouts.workout_id')
                           ->selectRaw('exercise_id,max(weight) as "maxWeight",max(repetitions) as "maxReps"')
                           ->where('user_id', $user->id)
                           ->groupBy('exercise_id')
                           ->get();
            // looping over every exercise, i should get the max reps and weight
            //but first i have to create a milestones
            $milestone = MileStone::create(['date' => Carbon::now()->toDateString(), 'user_id' => $user->id]);
            foreach ($exercises as $res) {
//                echo $maxReps, $maxWeight;
                $milestone->exercises()->attach($res->exercise_id, ['max_reps_per_set' => $res->maxReps, 'one_rep_max' => $res->maxWeight, 'date' => Carbon::now()->toDateString()]);
            }
        }

    }
}
