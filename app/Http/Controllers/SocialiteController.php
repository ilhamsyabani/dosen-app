<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function __construct()
    {
        // Tambahkan middleware 'guest' hanya untuk method 'redirect' dan 'callback'
        $this->middleware('guest')->except('logout');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $dosen = Dosen::where('email', $googleUser->getEmail())->first();

            if ($dosen) {
                Auth::guard('dosen')->login($dosen);

                return redirect()->intended('/dashboard');
            } else {
                return redirect('/login')->withErrors(['email' => 'Anda bukan dosen terdaftar']);
            }
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['email' => 'Terjadi kesalahan, silakan coba lagi']);
        }
    }

    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
