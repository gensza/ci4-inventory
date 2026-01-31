<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new Users();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
        ];

        $this->userModel->insert($data);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Register berhasil'
        ]);
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('Username', $username)->first();

        if (!$user || !password_verify($password, $user['Password'])) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Username atau password salah'
            ]);
        }

        session()->set([
            'user_id' => $user['ID'],
            'user_name' => $user['Username'],
            'logged_in' => true
        ]);

        return $this->response->setJSON([
            'status' => true
        ]);
    }

    public function logoutProcess()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
