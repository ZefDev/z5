<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Auth;
class SocialController extends Controller
{

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users = User::where(['provider_id' => $userSocial->getId()])->first();
        if ($users) {
            Auth::login($users);
            return redirect('/');
        } else {
            if ($provider !='github') {
                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail(),
                    'image' => $userSocial->getAvatar(),
                    'provider_id' => $userSocial->getId(),
                    'status' => 1,
                    'provider' => $provider,
                ]);
            }else{
                $user = User::create([
                    'name' => $userSocial->nickname,
                    'email' => $userSocial->email,
                    'image' => $userSocial->avatar,
                    'provider_id' => $userSocial->id,
                    'status' => 1,
                    'provider' => $provider,
                ]);
            }
            return redirect()->route('home');
        }
    }
}
