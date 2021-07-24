<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $exercise = array_map(function ($item) {
            return ['exercise'=>$item['name'],'sets'=>$item->pivot->sets,'repititions'=>$item->pivot->repititions,'rest period'=>$item->pivot->rest_period, 'weight'=>$item->pivot->weight];
        }, ExerciseResource::collection($this->exercises)->all());
        
        $muscleGroup = array_map(function ($item) {
            return $item['name'];
        }, $this->muscleGroup->all());

        return [
            'date'=>$this->date,
            'exercises'=> $exercise,
            'muscle groups'=>$muscleGroup
        ];
    }
}
