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
        return [
            'date'      => $this->date,
            'exercises' => [
                'name' => $this->exercises->pluck('name'),
                'one_rep_max'  => $this->exercises->pluck('pivot.one_rep_max'),
                'max_reps_per_set' => $this->exercises->pluck('pivot.max_reps_per_set')
            ]
        ];
    }
}
