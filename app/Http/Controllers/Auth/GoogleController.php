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
        return Socialite::driver('google')->scopes(['profile', 'email'])->redirect();

    }

    public function handleGoogleCallback()
    {
        $googleUser  = Socialite::driver('google')->user();
 
        $authUser  = User::where('email', $googleUser ->getEmail())->first();

        if ($authUser ) {
            if ($authUser->is_active == 1) {
                Auth::login($authUser, true);
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is not active. Please wait for admin approval.');
            }
        } else {
            $authUser  = User::create([
                'name' => $googleUser ->getName(),
                'email' => $googleUser ->getEmail(),
                'password' => $googleUser ->getId(),
                'google_id' => $googleUser ->getId(),
                'profile_picture' => $googleUser ->getAvatar(),
                'role' => 'user',
                'is_active' => 0,
            ]);
            Auth::login($authUser , true);
            try {
                Mail::to($authUser->email)->send(new RegistrationSuccessMail($authUser));
                Log::info("✅ Email sent successfully to {$authUser->email}");
            } catch (\Exception $e) {
                Log::error("❌ Failed to send email: " . $e->getMessage());
            }
            Auth::logout();
            return redirect('/register')->with('success', 'Your account has been created but needs admin approval.');
        }

        return redirect()->intended('/dashboard');
    }
}
