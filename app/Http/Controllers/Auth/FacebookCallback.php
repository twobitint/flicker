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
        $user->name = $facebook->getName();
        $user->nickname = $facebook->getNickname();
        $user->email = $facebook->getEmail();
        $user->facebook_id = $facebook->getId();
        $user->facebook_avatar = $facebook->getAvatar();
        $user->facebook_token = $facebook->token;
        // Facebook does not provide a refresh token.
        $user->facebook_refresh_token = $facebook->refreshToken;
        // Facebook logins appear to be good for 60 days.
        $user->facebook_expires_in = $facebook->expiresIn;
        $user->save();

        // Login and "remember" this user.
        Auth::login($user, true);

        return redirect()->route('welcome');
    }
}
