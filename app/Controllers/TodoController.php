<?php

namespace App\Controllers;

use App\Models\TodoModel;

class TodoController extends BaseController
{
    
    
  public function index()
{
    if (!session()->get('user_id')) {
        return redirect()->to('/login');
    }

    $model = new TodoModel();

    $data['todos'] = $model
        ->where('user_id', session()->get('user_id'))
        ->findAll();

    return view('todo_list', $data);
}

public function store()
{
    $model = new UserModel();

    $email = $this->request->getPost('email');

    // check if email already exists
    $existingUser = $model->where('email', $email)->first();

    if ($existingUser) {
        return redirect()->back()->with('error', 'Email already exists!');
    }

    $model->save([
        'name' => $this->request->getPost('name'),
        'email' => $email,
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    ]);

    return redirect()->to('/login');
}
        

  public function delete($id)
{
    $model = new TodoModel();

    $model->where('id', $id)
          ->where('user_id', session()->get('user_id'))
          ->delete();

    return redirect()->to('/');
}

    public function toggle($id)
    {
        $model = new TodoModel();
        $todo = $model->find($id);

        $model->update($id, [
            'status' => $todo['status'] ? 0 : 1
        ]);

        return redirect()->to('/');
    }

public function edit($id)
{
    $model = new TodoModel();

    $data['todo'] = $model
        ->where('id', $id)
        ->where('user_id', session()->get('user_id'))
        ->first();

    return view('edit_todo', $data);
}
    

public function update($id)
{
    $model = new TodoModel();

    $model->where('id', $id)
          ->where('user_id', session()->get('user_id'))
          ->set([
              'task' => $this->request->getPost('task')
          ])
          ->update();

    return redirect()->to('/');
}
}