<?php

namespace App\Policies;

use App\Proses;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProsesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->is_admin || $user->is_counter || $user->is_sales;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proses  $proses
     * @return mixed
     */
    public function view(User $user, Proses $proses)
    {
        return $user->is_admin || $user->is_counter || $user->is_sales;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proses  $proses
     * @return mixed
     */
    public function update(User $user, Proses $proses)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proses  $proses
     * @return mixed
     */
    public function delete(User $user, Proses $proses)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proses  $proses
     * @return mixed
     */
    public function restore(User $user, Proses $proses)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Proses  $proses
     * @return mixed
     */
    public function forceDelete(User $user, Proses $proses)
    {
        return $user->is_admin;
    }
}
