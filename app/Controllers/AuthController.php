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

        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login');
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
            'user_id'   => $user['id'],
            'user_name' => $user['name']
        ]);

        return redirect()->to('/');
    }

    return redirect()->to('/login');
}


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}