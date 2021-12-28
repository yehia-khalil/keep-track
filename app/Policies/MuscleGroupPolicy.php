<?php

namespace App\Policies;

use App\Models\MuscleGroup;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MuscleGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MuscleGroup  $muscleGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MuscleGroup $muscleGroup)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) {
            return $this->deny("You are not allowed to create a muscle group.");
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MuscleGroup  $muscleGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MuscleGroup $muscleGroup)
    {
        if (!$user->isAdmin()) {
            return $this->deny("You are not allowed to edit a muscle group.");
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MuscleGroup  $muscleGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MuscleGroup $muscleGroup)
    {
        if (!$user->isAdmin()) {
            return $this->deny("You are not allowed to delete a muscle group.");
        }
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MuscleGroup  $muscleGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MuscleGroup $muscleGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MuscleGroup  $muscleGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MuscleGroup $muscleGroup)
    {
        //
    }
}
