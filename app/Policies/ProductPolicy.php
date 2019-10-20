<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tour;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any tours.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the tour.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Tour  $tour
     * @return mixed
     */
    public function view(User $user, Tour $tour)
    {
        return true;
    }

    /**
     * Determine whether the user can create tours.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the tour.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Tour  $tour
     * @return mixed
     */
    public function update(User $user, Tour $tour)
    {
        return (auth()->id() === $tour->seller_id || auth()->id() > 40);
    }

    /**
     * Determine whether the user can delete the tour.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Tour  $tour
     * @return mixed
     */
    public function delete(User $user, Tour $tour)
    {
        return (auth()->id() === $tour->seller_id || auth()->id() > 40);
    }

    /**
     * Determine whether the user can restore the tour.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Tour  $tour
     * @return mixed
     */
    public function restore(User $user, Tour $tour)
    {
        return (auth()->id() > 40);
    }

    /**
     * Determine whether the user can permanently delete the tour.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Tour  $tour
     * @return mixed
     */
    public function forceDelete(User $user, Tour $tour)
    {
        return ($user->id > 40);
    }
}
