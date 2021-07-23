<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MileStone extends Model
{
    use HasFactory;

    protected $fillable = [
        'date'
    ];

    protected $table = 'milestones';

    public $timestamps = false;

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_milestone', 'milestone_id', 'exercise_id')->withPivot('one_rep_max','max_reps_per_set','date');
    }
}
