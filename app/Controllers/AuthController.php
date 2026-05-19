<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function store()
{
    $model = new UserModel();

    $email = $this->request->getPost('email');

    $existing = $model->where('email', $email)->first();

    if ($existing) {
        return redirect()->back()->with('error', '❌ Email already exists!');
    }

    $model->save([
        'name' => $this->request->getPost('name'),
        'email' => $email,
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    ]);

    return redirect()->to('/login')->with('success', 'Account created successfully!');
}
    public function login()
    {
        return view('login');
    }
  public function auth()
{
    $model = new UserModel();

    $email = $this->request->getPost('email');
    $pass  = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user && password_verify($pass, $user['password'])) {

        session()->set([
            'user_id' => $user['id'],
            'role'    => $user['role'],
            'name'    => $user['name']
        ]);

        if ($user['role'] === 'admin') {
               return redirect()->to('/admin/tasks');
        }

        return redirect()->to('/');
    }

    // ❌ login failed case
    return redirect()->to('/login')->with('error', 'Invalid email or password');
}
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

public function users()
{
    $model = new UserModel();

    $data['users'] = $model->findAll();

    return view('admin_users', $data);
}

public function changeRole($id, $role)
{
    $model = new UserModel();

    // 🔐 security check
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/');
    }

    // only allow valid roles
    if (!in_array($role, ['admin', 'user'])) {
        return redirect()->back();
    }

    $model->update($id, [
        'role' => $role
    ]);

    return redirect()->back()->with('success', 'Role updated successfully');
}
}