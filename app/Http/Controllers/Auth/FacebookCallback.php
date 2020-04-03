<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;

class FacebookCallback extends Controller
{
    /**
     * Create/Update and login User from Facebook.
     *
     * @return View
     */
    public function __invoke()
    {
        $facebook = Socialite::driver('facebook')->user();

        $user = User::firstOrNew(['facebook_id' => $facebook->getId()]);

        // Update user data.
        $user->updateFacebookAttributes($facebook);

        // Update friend circles.
        $user->updateFacebookFriends();

        // Login and "remember" this user.
        Auth::login($user, true);

        return redirect()->route('welcome');
    }
}
