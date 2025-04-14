<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;


class ProfilesPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }
        public function edit(User $user, Profile $profile){
            return $user->id === $profile->user_id;
        }

}

