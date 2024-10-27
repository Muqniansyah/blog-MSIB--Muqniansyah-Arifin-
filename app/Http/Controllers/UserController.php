<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();

        // Mengirim data pengguna ke view user
        return view('user.index', compact('user'));
    }
}
