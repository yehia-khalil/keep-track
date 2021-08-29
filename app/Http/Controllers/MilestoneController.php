<?php

namespace App\Http\Controllers;

use App\Models\MileStone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = DB::table('exercises_workouts')->select('exercise_id')->groupby('exercise_id')->get();
        $result = json_decode($result, true);
        // looping over every exercise, i should get the max reps and weight
        //but first i have to create a milestones
        $date = Carbon::now()->toDateString();
        $milestone = MileStone::create(['date' => $date, 'user_id' => $request->user()->id]);
        foreach ($result as $res) {
            echo $res['exercise_id'];
            $maxWeight =  DB::table('exercises_workouts')->where('exercise_id', $res['exercise_id'])->max('weight');
            $maxReps =  DB::table('exercises_workouts')->where('exercise_id', $res['exercise_id'])->max('repititions');
            $milestone->exercises()->attach($res['exercise_id'], ['max_reps_per_set' => $maxReps, 'one_rep_max' => $maxWeight, 'date' => $date]);
        }
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
