<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuscleGroupRequest;
use App\Http\Resources\SuccessResource;
use App\Models\MuscleGroup;
use App\Models\Workout;
use Illuminate\Http\Request;

class MuscleGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MuscleGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMuscleGroupRequest $request)
    {
        MuscleGroup::create($request->validated());
        return SuccessResource::make(['message'=>'Created successfully']);
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
