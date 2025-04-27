<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Favouris;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavourisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the favouris can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list favourises');
    }

    /**
     * Determine whether the favouris can view the model.
     */
    public function view(User $user, Favouris $model): bool
    {
        return $user->hasPermissionTo('view favourises');
    }

    /**
     * Determine whether the favouris can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create favourises');
    }

    /**
     * Determine whether the favouris can update the model.
     */
    public function update(User $user, Favouris $model): bool
    {
        return $user->hasPermissionTo('update favourises');
    }

    /**
     * Determine whether the favouris can delete the model.
     */
    public function delete(User $user, Favouris $model): bool
    {
        return $user->hasPermissionTo('delete favourises');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete favourises');
    }

    /**
     * Determine whether the favouris can restore the model.
     */
    public function restore(User $user, Favouris $model): bool
    {
        return false;
    }

    /**
     * Determine whether the favouris can permanently delete the model.
     */
    public function forceDelete(User $user, Favouris $model): bool
    {
        return false;
    }
}
