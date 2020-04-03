<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the facebook socialite data into our model.
     */
    public function updateFacebookAttributes($facebook): self
    {
        $this->name = $facebook->getName();
        $this->nickname = $facebook->getNickname();
        $this->email = $facebook->getEmail();
        $this->facebook_id = $facebook->getId();
        $this->facebook_avatar = $facebook->getAvatar();
        $this->facebook_token = $facebook->token;
        // Facebook does not provide a refresh token.
        $this->facebook_refresh_token = $facebook->refreshToken;
        // Facebook logins appear to be good for 60 days.
        $this->facebook_expires_in = $facebook->expiresIn;

        // Save changes.
        $this->save();

        // Chainable.
        return $this;
    }

    /**
     * Do something with the list of facebook friends.
     *
     * Note that the only friends that will show up are people who
     * have already signed into this app.
     */
    public function updateFacebookFriends(): void
    {
        $api = 'https://graph.facebook.com/me';
        $fields = 'friends{id}';
        $token = $this->facebook_token;

        $response = Http::get($api.'?fields='.$fields.'&access_token='.$token);

        if ($response->successful()) {
            $ids = collect($response->json()['friends'])->pluck('id');

            // Do something with the list of facebook ids.
        }
    }
}
