<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {

        try {

            $user = Socialite::driver('google')->user();

            $existingUser = User::where('google_id', $user->id)->first();

            if ($existingUser) {

                Auth::login($existingUser);

                return redirect(RouteServiceProvider::HOME);

            } else {

                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'avatar' => $user->getAvatar(),
                    'password' => encrypt(Str::random(8)), // 123456dummy
                    'email_verified_at' => now(),
                ]);

                Auth::login($newUser);

                return redirect(RouteServiceProvider::HOME);

            }

        } catch (Exception $e) {
            abort(519);
            // dd($e->getMessage());
        }

    }
}
