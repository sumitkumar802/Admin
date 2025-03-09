<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\RegistrationSuccessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => 0,
                'role' => 'user',
            ]);

            event(new Registered($user));

            // Auth::login($user);
            try {
                Mail::to($user->email)->send(new RegistrationSuccessMail($user));
                Log::info("✅ Email sent successfully to {$user->email}");
            } catch (\Exception $e) {
                Log::error("❌ Failed to send email: " . $e->getMessage());
            }
            DB::commit();
            Auth::logout();
            // SendRegistrationSuccessEmail::dispatch($user);
            return redirect('/login')->with('success', 'Your account has been created but needs admin approval.');
        }catch (\Exception $e){
            DB::rollBack();
            Log::error("❌ User registration failed: ".$e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);
        }
    }
}
