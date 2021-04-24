<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function logIn()
    {
        return view('user.login');
    }

    public function signIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect('/');
        } else {
            Session::flash('error', 'Tài khoản hoặc mật khẩu không đúng');
            return redirect('login');
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function signUp(Request $request)
    {
        $attributes = [
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => bcrypt($request->password)
        ];
        $this->userRepository->create($attributes);
        return redirect('login');
    }

    public function forgotPassword()
    {
        return view('user.forgot_password');
    }

    public function getList()
    {
        $users = $this->userRepository->getPaginate();
        // $users = $this->userRepository->getList();
        return view('dashboard.users.list', compact('users'));
    }
}
