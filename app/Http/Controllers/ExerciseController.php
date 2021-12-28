<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $exercises = Exercise::when($request->name, function ($q) use ($request) {
            $q->with('muscle_groups')->where(function ($q) use ($request) {
                foreach ($request->name as $param) {
                    $q->whereHas('muscle_groups', function ($q) use ($param) {
                        $q->where('name', $param);
                    });
                }
//            $q->whereHas('muscle_groups', function ($q) {
//                $q->where('name', 'arms');
//            })
//              ->whereHas('muscle_groups', function ($q) {
//                  $q->where('name', 'chest');
//              });
            });
        })
                             ->get();
//        ->toSql();
//        dd($exercises);
        return ExerciseResource::collection($exercises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExerciseRequest $request)
    {
        $this->authorize('create', Exercise::class);
        $exercise = Exercise::create(['name' => $request->name]);
        $exercise->muscle_groups()->attach($request->muscle_groups);
        return ExerciseResource::make($exercise);
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
    public function update(StoreExerciseRequest $request, Exercise $exercise)
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
