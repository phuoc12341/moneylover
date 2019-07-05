<?php

namespace App\Policies;

use App\Models\User;
use App\Social;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any socials.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Social  $social
     * @return mixed
     */
    public function view(User $user, Social $social)
    {
        //
    }

    /**
     * Determine whether the user can create socials.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create_social');
    }

    /**
     * Determine whether the user can update the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Social  $social
     * @return mixed
     */
    public function update(User $user, Social $social)
    {

    }

    /**
     * Determine whether the user can delete the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Social  $social
     * @return mixed
     */
    public function delete(User $user, Social $social)
    {
        return $user->hasPermission('delete_social');
    }

    /**
     * Determine whether the user can restore the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Social  $social
     * @return mixed
     */
    public function restore(User $user, Social $social)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the social.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Social  $social
     * @return mixed
     */
    public function forceDelete(User $user, Social $social)
    {
        //
    }
}
