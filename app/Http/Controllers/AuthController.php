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

    public function logOut()
    {
        Auth::logout();

        return redirect('/');
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
    public function adminRegister()
    {
        $user       = Auth::user();
        return view('dashboard.users.create', compact('user'));
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

    public function adminSignUp(Request $request)
    {
        $attributes = [
            'username'   => $request->username,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'role'       => $request->role
        ];
        $this->userRepository->create($attributes);
        return redirect('/admin/users');
    }

    public function forgotPassword()
    {
        return view('user.forgot_password');
    }

    public function getList()
    {
        $users = $this->userRepository->getPaginate();
        // $users = $this->userRepository->getList();
        return view('dashboard.users.list', compact('user'));
    }

    public function details($id)
    {

        $user_current  = $this->userRepository->getById($id);
        // dd($user);
        return view('dashboard.users.detail', compact('user_current'));
    }

    public function edit($id)
    {

        $user = $this->userRepository->getById($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function updateUser($id, Request $request)
    {
        $attributes = [
            'password'   => bcrypt($request->password),
            'role'       => $request->role
        ];
        $this->userRepository->update($id, $attributes);
        return redirect('/admin/users');
    }

    public function deleteUser($id)
    {
        $this->userRepository->delete($id);
        return redirect('/admin/users');
    }
}
