<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;

class MultiRoleLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'role' => 'required|in:admin,teacher,student',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $guard = $request->role;

        $check = $request->only('email', 'password');

        if ($guard && Auth::guard($guard)->attempt($check, $request->boolean('remember'))) {
            $user = auth::guard($guard)->user();

            if (!$user->roles()->where('name', $request->role)->exists()) {
                Auth::guard($guard)->logout();
                return redirect('login')->withErrors(['Error' => 'The give user role is not available']);
            }
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with(['success', 'The login is successful']);
        }

        return redirect('login')->withErrors(['role' => 'Incorrect Password or Email. Please try again with correct password and email']);
    }


    public function logout(Request $request)
    {
        foreach (['admin', 'student'] as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success' , 'Sucessfully LogOut');
    }
}
