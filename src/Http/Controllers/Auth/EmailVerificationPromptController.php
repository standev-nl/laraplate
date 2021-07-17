<?php

namespace StanDev\Laraplate\Http\Controllers\Auth;

use StanDev\Laraplate\Http\Controllers\Controller;
use StanDev\Laraplate\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('backend.auth.verify-email');
    }
}
