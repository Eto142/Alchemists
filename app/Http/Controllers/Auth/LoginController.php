<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Look up user manually — we deliberately do NOT call Auth::attempt()
        // so we never touch the auth session state before OTP is confirmed.
        $user = User::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'content' => 'Error',
                'message' => 'Invalid credentials',
            ]);
        }

        // Generate a 6-digit OTP and persist it on the user row.
        $otp = (string) random_int(100000, 999999);

        $user->login_otp            = $otp;
        $user->login_otp_expires_at = now()->addMinutes(10);
        $user->save();

        // Store only the user ID in the session — no login/logout/flush needed.
        $request->session()->put('otp_user_id',  $user->id);
        $request->session()->put('otp_remember', $request->boolean('remember_me'));

        // Send OTP email.
        Mail::to($user->email)->send(new LoginOtpMail($otp, $user->first_name));

        return response()->json([
            'content'  => 'Otp',
            'message'  => 'Code sent to your email',
            'redirect' => route('login.otp'),
        ]);
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->expectsJson()) {
            return response()->json(['content' => 'Logout Successful']);
        }

        return redirect()->route('login')->with('status', 'You have been logged out.');
    }
}
