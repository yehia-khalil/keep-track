<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_muscle_group');
    }


    public function workouts()
    {
        return $this->belongsToMany(Workout::class, 'exercise_muscle_group');
    }
}
