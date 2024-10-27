<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ForgotPasswordController extends Controller {
    public function showLinkRequestForm() {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request) {
        // Validasi email format
        $request->validate(['email' => 'required|email']);

        // Memastikan email sudah terdaftar
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email ini belum terdaftar di sistem kami.']);
        }

        // Mengirim link reset password ke email
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => 'Tautan reset password berhasil dikirim ke email Anda.'])
                    : back()->withErrors(['email' => 'Gagal mengirim tautan reset password. Coba lagi nanti.']);
    }
}
