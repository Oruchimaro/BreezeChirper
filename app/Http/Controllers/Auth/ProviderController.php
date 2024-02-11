<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            dd($socialUser);

            $userWithAnotherProvider = User::where([
                'email' => $socialUser->getEmail(),
            ])->first();

            if ($userWithAnotherProvider && $provider !== $userWithAnotherProvider->provider) {
                return redirect("/login")->withErrors([
                    'email' => __('messages.login.oauth.login_with_different_provider')
                ]);
            }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->id,
            ])->first();

            if (!$user) {
                if (!$socialUser->getEmail()) {
                    return redirect("/login")->withErrors([
                        'email' => __('messages.login.oauth.no_email_address_provided')
                    ]);
                }

                $user = User::create([
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'username' => User::generateUsername($socialUser->getNickname()),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Throwable $th) {
            return redirect("/login");
        }
    }
}
