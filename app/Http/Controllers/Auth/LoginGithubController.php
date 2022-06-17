<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGithubController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleCallbackProvider()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();

        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ],
        [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id
        ]);

        Auth::login($user,true);
        return redirect()->route('dashboard');
    }
}
