<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MilestoneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $exercise = array_map(function ($item) {
            return ['name' => $item['name'], 'one_rep_max' => $item->pivot->one_rep_max, 'max_reps_per_set' => $item->pivot->max_reps_per_set];
        }, ExerciseResource::collection($this->exercises)->all());

        return [
            'date'      => $this->date,
            'exercises' => $exercise
//                [
//                'name'             => $this->exercises->pluck('name'),
//                'one_rep_max'      => $this->exercises->pluck('pivot.one_rep_max'),
//                'max_reps_per_set' => $this->exercises->pluck('pivot.max_reps_per_set')
//            ]
        ];
    }
}
