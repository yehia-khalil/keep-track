<?php

namespace App\Policies;

use App\Models\Exercise;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExercisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Exercise $exercise
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if (!$user->isAdmin()) {
            return $this->deny("You are not allowed to create an exercise.");
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Exercise $exercise
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Exercise $exercise)
    {
        if (!$user->isAdmin()) {
            return $this->deny("You are not allowed to edit an exercise.");
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Exercise $exercise
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Exercise $exercise)
    {
        if (!$user->isAdmin()) {
            return $this->deny("You are not allowed to delete an exercise.");
        }
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Exercise $exercise
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Exercise $exercise)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Exercise $exercise
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Exercise $exercise)
    {
        //
    }
}
