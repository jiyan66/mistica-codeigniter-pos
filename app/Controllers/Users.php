<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        return view('users', ['users' => $users]);
    }

    public function new()
    {
        return view('users/create');
    }

    public function create()
    {
        $user = [
            'username'         => trim((string) $this->request->getPost('username')),
            'full_name'        => trim((string) $this->request->getPost('full_name')),
            'role'             => trim((string) $this->request->getPost('role')),
            'password'         => (string) $this->request->getPost('password'),
            'password_confirm' => (string) $this->request->getPost('password_confirm'),
        ];

        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'role'      => 'required|in_list[Administrator,Cashier,Manager,Staff]',
            'password'  => 'required|min_length[8]|max_length[255]',
            'password_confirm' => 'required|matches[password]',
        ];

        if (! $this->validateData($user, $rules)) {
            return view('users/create', [
                'user'   => $user,
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'role'       => $user['role'],
            'password'   => password_hash($user['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/users')
            ->with('success', 'User added successfully.');
    }

    public function edit(int $id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        return view('users/edit', [
            'user'   => $user,
            'errors' => [],
        ]);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();

        $existingUser = $userModel->find($id);

        if ($existingUser === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        $user = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'role'      => trim((string) $this->request->getPost('role')),
        ];

        $newPassword = (string) $this->request->getPost('password');
        $passwordConfirmation = (string) $this->request->getPost('password_confirm');

        $textRules = [
            'username' => [
                'rules' => 'required|max_length[50]|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'That username is already being used.',
                ],
            ],
            'full_name' => 'required|max_length[100]',
            'role'      => 'required|in_list[Administrator,Cashier,Manager,Staff]',
        ];

        if (! $this->validateData($user, $textRules)) {
            return view('users/edit', [
                'user'   => array_merge($existingUser, $user),
                'errors' => $this->validator->getErrors(),
            ]);
        }

        if ($newPassword !== '' || $passwordConfirmation !== '') {
            $passwordData = [
                'password'         => $newPassword,
                'password_confirm' => $passwordConfirmation,
            ];

            $passwordRules = [
                'password'         => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'required|matches[password]',
            ];

            if (! $this->validateData($passwordData, $passwordRules)) {
                return view('users/edit', [
                    'user'   => array_merge($existingUser, $user),
                    'errors' => $this->validator->getErrors(),
                ]);
            }
        }

        $avatar = $this->request->getFile('avatar');

        $hasNewAvatar = $avatar !== null
            && $avatar->getError() !== UPLOAD_ERR_NO_FILE;

        if ($hasNewAvatar) {
            $avatarRules = [
                'avatar' => [
                    'label' => 'Avatar',
                    'rules' => [
                        'is_image[avatar]',
                        'mime_in[avatar,image/jpeg,image/png]',
                        'ext_in[avatar,jpg,jpeg,png]',
                        'max_size[avatar,2048]',
                    ],
                ],
            ];

            if (! $this->validateData([], $avatarRules)) {
                return view('users/edit', [
                    'user'   => array_merge($existingUser, $user),
                    'errors' => $this->validator->getErrors(),
                ]);
            }
        }

        $updateData = [
            'username'  => $user['username'],
            'full_name' => $user['full_name'],
            'role'      => $user['role'],
        ];

        if ($newPassword !== '') {
            $updateData['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $newAvatarPath = null;

        if ($hasNewAvatar) {
            $avatarDirectory = FCPATH
                . 'uploads'
                . DIRECTORY_SEPARATOR
                . 'avatars';

            $newAvatarName = $avatar->getRandomName();

            $avatar->move($avatarDirectory, $newAvatarName);

            $newAvatarPath = $avatarDirectory
                . DIRECTORY_SEPARATOR
                . $newAvatarName;

            service('image')
                ->withFile($newAvatarPath)
                ->fit(300, 300, 'center')
                ->save($newAvatarPath);

            $updateData['avatar'] = $newAvatarName;
        }

        $userModel->update($id, $updateData);

        if ($hasNewAvatar && ! empty($existingUser['avatar'])) {
            $oldAvatarPath = FCPATH
                . 'uploads'
                . DIRECTORY_SEPARATOR
                . 'avatars'
                . DIRECTORY_SEPARATOR
                . $existingUser['avatar'];

            if (is_file($oldAvatarPath)) {
                unlink($oldAvatarPath);
            }
        }

        return redirect()
            ->to('/users')
            ->with('success', 'User updated successfully.');
    }
}
