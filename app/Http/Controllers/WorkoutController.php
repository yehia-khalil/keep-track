<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Resources\WorkoutResource;
use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return WorkoutResource::collection(
            Workout::where('user_id', $request->user()->id)
                   ->with('exercises')
                   ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkoutRequest $request)
    {
        $workout = Workout::create(['date' => $request->date, 'user_id' => $request->user()->id]);

        // to attach repetitions to each exercise in the workout
        for ($i = 0; $i < count($request->repetitions); $i++) {
            $workout->exercises()->attach
            (
                $request->exercises[$i],
                ['repetitions' => $request->repetitions[$i],
                 'sets'        => $request->sets[$i],
                 'rest_period' => $request->rest_period[$i],
                 'weight'      => $request->weight[$i]
                ]
            );
        }

        // to attach muscle groups worked with the exercises in this workout
        for ($i = 0; $i < count($request->repetitions); $i++) {
            $workout->muscleGroup()->syncWithoutDetaching((Exercise::find($request->exercises[$i])->muscle_groups)->pluck('id')->all());
        }
        return WorkoutResource::make($workout);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
