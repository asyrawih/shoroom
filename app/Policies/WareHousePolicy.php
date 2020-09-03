<?php

namespace App\Policies;

use App\User;
use App\warehouse;
use Illuminate\Auth\Access\HandlesAuthorization;

class WareHousePolicy
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
        return $user->is_admin or $user->is_warehose || $user->is_counter || $user->is_sales;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\warehouse  $warehouse
     * @return mixed
     */
    public function view(User $user, warehouse $warehouse)
    {
        return $user->is_admin or $user->is_warehose;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin || $user->is_warehose;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\warehouse  $warehouse
     * @return mixed
     */
    public function update(User $user, warehouse $warehouse)
    {
        return $user->is_admin || $user->is_warehose;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\warehouse  $warehouse
     * @return mixed
     */
    public function delete(User $user, warehouse $warehouse)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\warehouse  $warehouse
     * @return mixed
     */
    public function restore(User $user, warehouse $warehouse)
    {
        return $user->is_admin;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\warehouse  $warehouse
     * @return mixed
     */
    public function forceDelete(User $user, warehouse $warehouse)
    {
        return $user->is_admin;
    }
}
