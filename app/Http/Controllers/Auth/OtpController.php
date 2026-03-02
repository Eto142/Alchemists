<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\LoginOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    /**
     * Show the OTP verification form.
     */
    public function showOtpForm(Request $request)
    {
        // If no pending OTP session, redirect to login
        if (!$request->session()->has('otp_user_id')) {
            return redirect()->route('login')->with('error', 'Session expired. Please sign in again.');
        }

        return view('auth.login-otp');
    }

    /**
     * Verify the submitted OTP and complete login.
     */
    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        if (!$request->session()->has('otp_user_id')) {
            return response()->json([
                'content' => 'Error',
                'message' => 'Session expired. Please sign in again.',
            ]);
        }

        $userId = $request->session()->get('otp_user_id');
        $user   = User::findOrFail($userId);

        // Check expiry
        if (!$user->login_otp_expires_at || now()->isAfter($user->login_otp_expires_at)) {
            $user->login_otp            = null;
            $user->login_otp_expires_at = null;
            $user->save();
            $request->session()->forget(['otp_user_id', 'otp_remember']);
            return response()->json([
                'content' => 'Error',
                'message' => 'Your code has expired. Please sign in again.',
            ]);
        }

        // Check code match
        if ($request->input('otp') !== $user->login_otp) {
            return response()->json([
                'content' => 'Error',
                'message' => 'Invalid code. Please try again.',
            ]);
        }

        $remember = $request->session()->get('otp_remember', false);

        // Clear OTP from DB
        $user->login_otp            = null;
        $user->login_otp_expires_at = null;
        $user->save();

        // Log the user in — Auth::login() handles session migration internally.
        $request->session()->forget(['otp_user_id', 'otp_remember']);
        Auth::login($user, $remember);

        return response()->json([
            'content'  => 'Successful',
            'message'  => 'Login Successful',
            'redirect' => url('dashboard'),
        ]);
    }

    /**
     * Resend the OTP to the user's email.
     */
    public function resend(Request $request)
    {
        if (!$request->session()->has('otp_user_id')) {
            return response()->json([
                'content' => 'Error',
                'message' => 'Session expired. Please sign in again.',
            ]);
        }

        $userId = $request->session()->get('otp_user_id');
        $user   = User::findOrFail($userId);

        // Generate fresh OTP and persist it
        $otp = (string) random_int(100000, 999999);

        $user->login_otp            = $otp;
        $user->login_otp_expires_at = now()->addMinutes(10);
        $user->save();

        Mail::to($user->email)->send(new LoginOtpMail($otp, $user->first_name));

        return response()->json([
            'content' => 'Successful',
            'message' => 'A new code has been sent to your email.',
        ]);
    }
}
