<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
   public function index()
{
    if (!session()->get('user_id')) {
        return redirect()->to('/login');
    }

    $model = new \App\Models\UserModel();
    $user = $model->find(session()->get('user_id'));

    // 🛡 ADMIN PROFILE
    if ($user['role'] == 'admin') {
        return view('admin_profile', ['user' => $user]);
    }

    // 👤 USER PROFILE
    return view('profile', ['user' => $user]);
}
    // EDIT PAGE
    public function edit()
{
    $model = new \App\Models\UserModel();
    $user = $model->find(session()->get('user_id'));

    if ($user['role'] == 'admin') {
        return view('admin_profile_edit', ['user' => $user]);
    }

    return view('edit_profile', ['user' => $user]);
}



    // UPDATE PROFILE
    public function update()
    {
        $model = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        $model->update(session()->get('user_id'), [

            'name' => $name,
            'email' => $email

        ]);

        // update session name
        session()->set('name', $name);

        return redirect()->to('/profile')
            ->with('success', 'Profile updated successfully');
    }



    // PASSWORD PAGE
    public function password()
    {
        return view('/change_password');
    }



    // UPDATE PASSWORD
    public function updatePassword()
    {
        $model = new UserModel();

        $user = $model->find(session()->get('user_id'));

        $oldPassword = $this->request->getPost('old_password');

        $newPassword = $this->request->getPost('new_password');

        // verify old password
        if (!password_verify($oldPassword, $user['password'])) {

            return redirect()->back()
                ->with('error', 'Old password incorrect');
        }

        // update password
        $model->update($user['id'], [

            'password' => password_hash($newPassword, PASSWORD_DEFAULT)

        ]);

        return redirect()->to('/profile')
            ->with('success', 'Password changed successfully');
    }



    // DELETE ACCOUNT
    public function deleteAccount()
    {
        $model = new UserModel();

        $model->delete(session()->get('user_id'));

        session()->destroy();

        return redirect()->to('/register')
            ->with('success', 'Account deleted');
    }

}