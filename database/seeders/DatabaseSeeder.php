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
        
        
        DB::table('muscle_groups')->insert(['name'=>'chest']);
        DB::table('muscle_groups')->insert(['name'=>'arms']);
        DB::table('muscle_groups')->insert(['name'=>'back']);
        DB::table('muscle_groups')->insert(['name'=>'legs']);
        DB::table('muscle_groups')->insert(['name'=>'shoulders']);
        DB::table('muscle_groups')->insert(['name'=>'abs']);
        
        // \App\Models\User::factory(10)->create();
        DB::table('exercises')->insert(['name'=>'push ups']);
        DB::table('exercises')->insert(['name'=>'pull ups']);
        DB::table('exercises')->insert(['name'=>'chin ups']);
        DB::table('exercises')->insert(['name'=>'squats']);
        DB::table('exercises')->insert(['name'=>'curls']);
        DB::table('exercises')->insert(['name'=>'triceps extensions']);
        DB::table('exercises')->insert(['name'=>'tricep dips']);
        DB::table('exercises')->insert(['name'=>'sit ups']);
        DB::table('exercises')->insert(['name'=>'leg raises']);
        DB::table('exercises')->insert(['name'=>'deadlifts']);
        DB::table('exercises')->insert(['name'=>'decline pushups']);
        DB::table('exercises')->insert(['name'=>'incline pushups']);
        
        
    }
}
