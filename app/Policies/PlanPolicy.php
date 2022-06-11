<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Izstrādātājam visi ceļi vaļā neatkarīgi no citām definētam atļaujām, tāpēc return true tikai tad, ja ir izstrādātājs
     *
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        // iestrādāt ja grib pārrakstīt pārējās atļaujas
        if ($user->isDeveloper()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasRole(['Administrators', 'Mācībspēks', 'Lietotājs']);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Plan $plan
     * @return mixed
     */
    public function view(User $user, Plan $plan)
    {
        return $user->hasRole('Administrators');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('Administrators');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Plan $plan
     * @return mixed
     */
    public function update(User $user, Plan $plan)
    {
        return $user->hasRole('Administrators');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Plan $plan
     * @return mixed
     */
    public function delete(User $user, Plan $plan)
    {
        return $user->hasRole('Administrators');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Plan $plan
     * @return mixed
     */
    public function restore(User $user, Plan $plan)
    {
        return $user->hasRole('Administrators');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Plan $plan
     * @return mixed
     */
    public function forceDelete(User $user, Plan $plan)
    {
        return false;
    }
}
