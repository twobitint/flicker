<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class Welcome extends Controller
{
    /**
     * Handle welcome flow.
     *
     * @return View
     */
    public function __invoke()
    {
        if (Auth::check()) {
            return view('app');
        } else {
            return view('login');
        }
    }
}
