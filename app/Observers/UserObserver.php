<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {
        $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));
    }

//    /**
//     * Handle the User "updated" event.
//     *
//     * @param  \App\Models\User  $user
//     * @return void
//     */
//    public function updated(User $user)
//    {
//        //
//    }
//
//    /**
//     * Handle the User "deleted" event.
//     *
//     * @param  \App\Models\User  $user
//     * @return void
//     */
//    public function deleted(User $user)
//    {
//        //
//    }
//
//    /**
//     * Handle the User "forceDeleted" event.
//     *
//     * @param  \App\Models\User  $user
//     * @return void
//     */
//    public function forceDeleted(User $user)
//    {
//        //
//    }
}
