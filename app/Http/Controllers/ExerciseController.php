<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExerciseRequest;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function queryBuilder(Request $request)
    {
//        $inValues=[];
//        $equalValues=[];
//        array_map(function($element){
//            foreach ($element->values as $value){
//                if($value->operator == 'equal'){
//                    array_push($equalValues,);
//                }
//            }
//        },$request->entities);
//        dd($request->all());
//        dd((Exercise::with('muscle_groups')->first())->muscle_groups->getKeyName());
        if ($request->filter == "and") {
            $exercises = Exercise::when($request->entities, function ($q) use ($request) {
                foreach ($request->entities as $entity) {
                    $q->with($entity['name'])->where(function ($query) use ($request, $entity) {
//                            if ($value['operator'] == 'in') {
                        $name = $entity['name'];
                        $query->whereHas($name, function ($q) use ($name, $entity) {
                            foreach ($entity['values'] as $value) {
                                if ($value['operator'] == 'in') {
                                    $q->whereIn("$name.id", $value['value']);
                                }
//                                if ($value['operator'] == 'equal') {
//                                    $q->where("$name.id", $value['value']);
//                                }
                            }
                        });
//                            }
                        foreach ($entity['values'] as $value) {
                            if ($value['operator'] == 'equal') {
                                $name = $entity['name'];
                                $query->whereHas($name, function ($q) use ($value, $name) {
                                    $q->where("$name.id", $value['value']);
                                });
                            }
                        }
                    });
                }
            })
//                                 ->pluck('name');
                                 ->toSql();
        } else {
            //or
            $exercises = Exercise::when($request->entities, function ($q) use ($request) {
                foreach ($request->entities as $entity) {
                    $q->with($entity['name'])->where(function ($query) use ($request, $entity) {
                        $name = $entity['name'];
                        $query->whereHas($name, function ($q) use ($entity, $name) {
                            $q->where(function ($q) use ($entity, $name) {
                                foreach ($entity['values'] as $value) {
                                    if ($value['operator'] == 'in') {
                                        $q->orWhereIn("$name.id", $value['value']);
                                    }
                                    if ($value['operator'] == 'equal') {
                                        $q->orWhere("$name.id", $value['value']);
                                    }
                                }
                            });
                        });
                    })
//                                             ->orWhere(function ($query) use ($request, $entity) {
//                        foreach ($entity['values'] as $value) {
//                            if ($value['operator'] == 'equal') {
//                                $name = $entity['name'];
//                                $query->whereHas($name, function ($q) use ($value, $name) {
//                                    $q->where("$name.id", $value['value']);
//                                });
//                            }
//                        }
//                    })
                    ;
                }
            })
                                 ->pluck('name');
//                                 ->toSql();
        }
        dd($exercises);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index(Request $request)
    {
        $exercises = Exercise::when($request->name, function ($q) use ($request) {
            $q->with('muscle_groups')->where(function ($q) use ($request) {
                foreach ($request->name as $param) {
                    $q->whereHas('muscle_groups', function ($q) use ($param) {
                        $q->where('name', $param);
                    });
                }
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
    public
    function store(StoreExerciseRequest $request)
    {
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
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(StoreExerciseRequest $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
