<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin'));
        }
        return view('admin/login');
    }

    public function loginSubmit()
    {
        $userModel = new UserModel();
        $usernameOrEmail = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->groupStart()
                          ->where('username', $usernameOrEmail)
                          ->orWhere('email', $usernameOrEmail)
                          ->groupEnd()
                          ->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'isLoggedIn' => true
            ]);
            return redirect()->to(base_url('admin'))->with('success', 'Welcome back, ' . $user['username'] . '!');
        }

        return redirect()->to(base_url('admin/login'))->with('error', 'Invalid username or password.')->withInput();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'))->with('success', 'You have been successfully logged out.');
    }
}
