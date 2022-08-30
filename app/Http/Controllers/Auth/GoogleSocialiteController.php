<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;

class GoogleSocialiteController extends Controller
{
    //
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // only allow people with @company.com to login
        if(explode("@", $user->email)[1] !== 'gmail.com'){
            return redirect()->to('/home');
        }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->password        = encrypt('my-google');
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/home');
    }
}
