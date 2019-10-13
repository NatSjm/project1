<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tour;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductupdatetPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Tour $tour)
    {
        return auth()->id() === $tour->seller_id;
    }

}
