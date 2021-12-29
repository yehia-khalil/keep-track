<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'user_id'];
    public $timestamps = false;

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercises_workouts', 'workout_id', 'exercise_id')->withPivot(['repetitions', 'sets', 'rest_period', 'weight']);
    }

    public function muscle_groups()
    {
        return $this->belongsToMany(MuscleGroup::class, 'workout_muscle_group');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
