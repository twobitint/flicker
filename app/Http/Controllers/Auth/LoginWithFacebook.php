<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class LoginWithFacebook extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke()
    {
        return Socialite::driver('facebook')
            ->scopes(['user_friends', 'public_profile', 'basic_info'])
            ->redirect();
    }
}
