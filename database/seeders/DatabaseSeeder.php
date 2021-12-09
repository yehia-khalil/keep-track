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

        $this->call(UserSeeder::class);

        DB::table('muscle_groups')->insert(['name' => 'chest']);
        DB::table('muscle_groups')->insert(['name' => 'arms']);
        DB::table('muscle_groups')->insert(['name' => 'back']);
        DB::table('muscle_groups')->insert(['name' => 'legs']);
        DB::table('muscle_groups')->insert(['name' => 'shoulders']);
        DB::table('muscle_groups')->insert(['name' => 'abs']);

        // \App\Models\User::factory(10)->create();
        DB::table('exercises')->insert(['name' => 'push ups', 'url' => 'https://www.youtube.com/watch?v=IODxDxX7oi4']);
        DB::table('exercises')->insert(['name' => 'pull ups', 'url' => 'https://www.youtube.com/watch?v=eGo4IYlbE5g']);
        DB::table('exercises')->insert(['name' => 'chin ups', 'url' => 'https://www.youtube.com/watch?v=mRy9m2Q9_1I']);
        DB::table('exercises')->insert(['name' => 'squats', 'url' => 'https://www.youtube.com/watch?v=U3HlEF_E9fo']);
        DB::table('exercises')->insert(['name' => 'curls', 'url' => 'https://www.youtube.com/watch?v=Nkl8WnH6tDU']);
        DB::table('exercises')->insert(['name' => 'triceps extensions', 'url' => 'https://www.youtube.com/watch?v=nRiJVZDpdL0']);
        DB::table('exercises')->insert(['name' => 'tricep dips', 'url' => 'https://www.youtube.com/watch?v=6kALZikXxLc']);
        DB::table('exercises')->insert(['name' => 'sit ups', 'url' => 'https://www.youtube.com/watch?v=1fbU_MkV7NE']);
        DB::table('exercises')->insert(['name' => 'leg raises', 'url' => 'https://www.youtube.com/watch?v=JB2oyawG9KI']);
        DB::table('exercises')->insert(['name' => 'deadlifts', 'url' => 'https://www.youtube.com/watch?v=ytGaGIn3SjE']);
        DB::table('exercises')->insert(['name' => 'decline pushups', 'url' => 'https://www.youtube.com/watch?v=SKPab2YC8BE']);
        DB::table('exercises')->insert(['name' => 'incline pushups', 'url' => 'https://www.youtube.com/watch?v=Me9bHFAxnCs']);

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
