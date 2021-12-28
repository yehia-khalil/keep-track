<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function getVideoAttribute()
    {
        return $this->url;
    }

    public function muscle_groups()
    {
        return $this->belongsToMany(MuscleGroup::class, 'exercise_muscle_group');
    }

    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'exercises_workouts');
    }

    public function milestones()
    {
        return $this->belongsToMany(MileStone::class, 'exercise_milestone');
    }


}
