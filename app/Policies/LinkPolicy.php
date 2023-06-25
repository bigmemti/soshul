<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $auth_user,User $owner_user): bool
    {
        return $auth_user->id == $owner_user->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Link $link): bool
    {
        return $user->id == $link->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $auth_user,User $owner_user): bool
    {
        return  $auth_user->id == $owner_user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Link $link): bool
    {
        return  $user->id == $link->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Link $link): bool
    {
        return  $user->id == $link->user_id;
    }
}
