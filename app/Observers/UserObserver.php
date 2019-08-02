<?php

namespace App\Observers;

use App\User;
use App\Userprofile;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
       Userprofile::create([
            'users_id' => $user->id,
            'address' => 'Your Address',
            'phone_number' => 'Your Number',
            'city' => 'Your City',
            'country' => 'Your Country',
            'body' => 'Something About Yourself',
            'user_img' => 'Your image here'
        ]);
   }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
       Userprofile::create([
        'users_id' => $user->id,
        'address' => 'Your Address',
        'phone_number' => 'Your Number',
        'city' => 'Your City',
        'country' => 'Your Country',
        'body' => 'Something About Yourself',
        'user_img' => 'Your image here'
    ]);
   }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
