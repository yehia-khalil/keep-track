<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('muscle_groups')->insert(['name' => 'chest']);
        DB::table('muscle_groups')->insert(['name' => 'arms']);
        DB::table('muscle_groups')->insert(['name' => 'back']);
        DB::table('muscle_groups')->insert(['name' => 'legs']);
        DB::table('muscle_groups')->insert(['name' => 'shoulders']);
        DB::table('muscle_groups')->insert(['name' => 'abs']);

        // \App\Models\User::factory(10)->create();
        DB::table('exercises')->insert(['name' => 'push ups']);
        DB::table('exercises')->insert(['name' => 'pull ups']);
        DB::table('exercises')->insert(['name' => 'chin ups']);
        DB::table('exercises')->insert(['name' => 'squats']);
        DB::table('exercises')->insert(['name' => 'curls']);
        DB::table('exercises')->insert(['name' => 'triceps extensions']);
        DB::table('exercises')->insert(['name' => 'tricep dips']);
        DB::table('exercises')->insert(['name' => 'sit ups']);
        DB::table('exercises')->insert(['name' => 'leg raises']);
        DB::table('exercises')->insert(['name' => 'deadlifts']);
        DB::table('exercises')->insert(['name' => 'decline pushups']);
        DB::table('exercises')->insert(['name' => 'incline pushups']);

        //push ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 1, 'muscle_group_id' => 1]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 1, 'muscle_group_id' => 2]);
        //pull ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 2, 'muscle_group_id' => 2]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 2, 'muscle_group_id' => 3]);
        //chin ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 3, 'muscle_group_id' => 2]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 3, 'muscle_group_id' => 3]);
        //squats
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 4, 'muscle_group_id' => 4]);
        //curls
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 5, 'muscle_group_id' => 2]);
        //triceps extensions
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 6, 'muscle_group_id' => 2]);
        //triceps dips
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 7, 'muscle_group_id' => 2]);
        //sit ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 8, 'muscle_group_id' => 6]);
        //leg raises
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 9, 'muscle_group_id' => 6]);
        //deadlifts
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 10, 'muscle_group_id' => 4]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 10, 'muscle_group_id' => 3]);
        //decline push ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 11, 'muscle_group_id' => 1]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 11, 'muscle_group_id' => 2]);
        //incline push ups
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 12, 'muscle_group_id' => 1]);
        DB::table('exercise_muscle_group')->insert(['exercise_id' => 12, 'muscle_group_id' => 2]);
    }
}
