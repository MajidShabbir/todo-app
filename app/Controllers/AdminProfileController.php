<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminProfileController extends BaseController
{
    // =========================
    // SHOW PROFILE
    // =========================
    public function index()
    {
        $user = (new UserModel())->find(session()->get('user_id'));

        return view('admin_profile', ['user' => $user]);
    }

    // =========================
    // EDIT PAGE
    // =========================
    public function edit()
    {
        $user = (new UserModel())->find(session()->get('user_id'));

        return view('admin_profile_edit', ['user' => $user]);
    }

    // =========================
    // UPDATE PROFILE
    // =========================
    public function update()
    {
        $model = new UserModel();

        $model->update(session()->get('user_id'), [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('admin/profile')
            ->with('success', 'Profile updated');
    }

    // =========================
    // PASSWORD PAGE
    // =========================
    public function password()
    {
        return view('admin_change_password');
    }

    // =========================
    // UPDATE PASSWORD
    // =========================
   public function updatePassword()
{
    $model = new \App\Models\UserModel();

    $user = $model->find(session()->get('user_id'));

    $old = $this->request->getPost('old_password');
    $new = $this->request->getPost('new_password');

    if (!password_verify($old, $user['password'])) {
        return redirect()->back()->with('error', 'Old password incorrect');
    }

    $model->update($user['id'], [
        'password' => password_hash($new, PASSWORD_DEFAULT)
    ]);

    // 🔥 SECURITY: logout after password change
    session()->destroy();

    return redirect()->to('/login')
        ->with('success', 'Password changed. Please login again.');
}

    // =========================
    // DELETE ACCOUNT
    // =========================
    public function deleteAccount()
    {
        $model = new UserModel();

        $model->delete(session()->get('user_id'));

        session()->destroy();

        return redirect()->to('/register');
    }
}