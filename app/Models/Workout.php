<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable=['date'];
    public $timestamps = false;

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercises_workouts', 'workout_id', 'exercise_id')->withPivot(['repititions','sets','rest_period','weight']);
    }

    public function muscleGroup()
    {
        return $this->belongsToMany(MuscleGroup::class, 'exercise_muscle_group');
    }
}
