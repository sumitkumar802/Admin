<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        // return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->scopes(['profile', 'email'])->redirect();

    }

    public function handleGoogleCallback()
    {
        $googleUser  = Socialite::driver('google')->user();
        // echo "<pre>";
        // print_r($googleUser);
        // // dd($googleUser ->getAvatar(),$googleUser ->getId());
        // exit();
        $authUser  = User::where('email', $googleUser ->getEmail())->first();

        if ($authUser ) {
            Auth::login($authUser , true);
        } else {
            $authUser  = User::create([
                'name' => $googleUser ->getName(),
                'email' => $googleUser ->getEmail(),
                'password' => $googleUser ->getId(),
                'google_id' => $googleUser ->getId(),
                'profile_picture' => $googleUser ->getAvatar(),
            ]);
            Auth::login($authUser , true);
            try {
                Mail::to($authUser->email)->send(new RegistrationSuccessMail($authUser));
                Log::info("✅ Email sent successfully to {$authUser->email}");
            } catch (\Exception $e) {
                Log::error("❌ Failed to send email: " . $e->getMessage());
            }
        }

        return redirect()->intended('/dashboard');
    }
}
