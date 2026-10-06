<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        return view('auth/login', [
            'errors'   => [],
            'username' => '',
        ]);
    }

    public function attempt()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        $credentials = [
            'username' => trim((string) $this->request->getPost('username')),
            'password' => (string) $this->request->getPost('password'),
        ];

        $rules = [
            'username' => 'required|max_length[50]',
            'password' => 'required|max_length[255]',
        ];

        if (! $this->validateData($credentials, $rules)) {
            return view('auth/login', [
                'errors'   => $this->validator->getErrors(),
                'username' => $credentials['username'],
            ]);
        }

        $userModel = new UserModel();
        $user = $userModel
            ->where('username', $credentials['username'])
            ->first();

        if (
            $user === null
            || empty($user['password'])
            || ! password_verify($credentials['password'], $user['password'])
        ) {
            return view('auth/login', [
                'errors'   => ['login' => 'Invalid username or password.'],
                'username' => $credentials['username'],
            ]);
        }

        $session = session();
        $session->regenerate(true);
        $session->set([
            'isLoggedIn' => true,
            'userId'     => $user['id'],
            'username'   => $user['username'],
            'fullName'   => $user['full_name'],
            'role'       => $user['role'],
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Welcome, ' . $user['full_name'] . '.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
