<?php

namespace App\Policies\V1;

use App\Models\Ticket;
use App\Models\User;
use App\Permissions\V1\Abilities;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->tokenCan(Abilities::CreateUser);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return $user->tokenCan(Abilities::UpdateUser);
    }

    /**
     * Determine whether the user can replace the model.
     */
    public function replace(User $user): bool
    {
        return $user->tokenCan(Abilities::ReplaceUser);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
       return $user->tokenCan(Abilities::DeleteUser);
    }
}
