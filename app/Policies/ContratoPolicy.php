<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contrato;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     */
    public function viewAny(User $user)
    {
        return $user->state == '1';
    }

    /**
     * Determine whether the user can view the model.
     *
     */
    public function view(User $user, Contrato $contrato)
    {
        return $user->state === $contrato->state
            ? Response::allow()
            : Response::deny("THIS ACTION IS UNAUTHORIZED.");
    }

    /**
     * Determine whether the user can create models.
     *
     */
    public function create(User $user)
    {
        return $user->state == '1';
    }

    /**
     * Determine whether the user can update the model.
     *
     */
    public function update(User $user, Contrato $contrato)
    {
        return $user->state === $contrato->state
            ? Response::allow()
            : Response::deny("THIS ACTION IS UNAUTHORIZED.");
    }

    /**
     * Determine whether the user can delete the model.
     *
     */
    public function delete(User $user, Contrato $contrato)
    {
        return $user->state == '1'
            ? Response::allow()
            : Response::deny("THIS ACTION IS UNAUTHORIZED.");
    }
}
