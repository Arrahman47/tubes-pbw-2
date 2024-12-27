<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
{
    $socialUser = Socialite::driver('google')->user();

    $registeredUser = User::where("google_id", $socialUser->id)->first();

    if(!$registeredUser){
        $user = User::updateOrCreate([
            'google_id' => $socialUser->id,
        ], [
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'password' => Hash::make('123'), // Set default password
            'google_token' => Hash::make('123'),
            'google_refresh_token' => $socialUser->refreshToken,
            'role' => 'Customer', // Set default role as 'customer'
        ]);
       
        $user->assignRole('Customer');

        Auth::login($user);
        return redirect('/dashboard');
    }

    Auth::login($registeredUser);
    return redirect('/dashboard');
}

}
