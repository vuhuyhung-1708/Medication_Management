<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $account = Account::where('username', $request->username)->first();

        if ($account && $account->password === $request->password) {
            Auth::login($account);
            return redirect()->intended('/home');
        } else {
            return redirect()->back()->withErrors([
                'login_error' => 'Tên đăng nhập hoặc mật khẩu không đúng.',
            ])->withInput($request->except('password'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}