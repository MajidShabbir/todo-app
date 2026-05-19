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
        ->orderBy('id', 'DESC') 
        ->findAll();

    return view('todo_list', $data);
}

public function store()
{
    $model = new TodoModel();

     $task = trim($this->request->getPost('task'));

    // validation
    if ($task == '') {
        return redirect()->to('/')
            ->with('error', 'Task cannot be empty');
    }

    $model->save([
        'task' => $this->request->getPost('task'),
        'user_id' => session()->get('user_id'),
        'status' => 0
    ]);

    return redirect()->to('/');
}   

  public function delete($id)
{
    $model = new TodoModel();
    $userId = session()->get('user_id');

    $deleted = $model
        ->where('id', $id)
        ->where('user_id', $userId)
        ->delete();

    if (!$deleted) {
        return redirect()->back()
            ->with('error', '❌ Not allowed to delete this task.');
    }

    return redirect()->back()
        ->with('success', '✔ Task deleted');
}

public function edit($id)
{
    $model = new TodoModel();
    $userId = session()->get('user_id');

    $todo = $model->find($id);

    // ❌ not found OR belongs to another user
    if (!$todo || $todo['user_id'] != $userId) {
        return redirect()->to('/')
            ->with('error', '❌ You are not allowed to access this task.');
    }

    return view('edit_todo', ['todo' => $todo]);
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
public function adminDashboard()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/dashboard');
    }

    $model = new TodoModel();

    $data['todos'] = $model->select('todos.*, users.name')
        ->join('users', 'users.id = todos.user_id')
        ->findAll();

    return view('todos/admin_dashboard', $data);
}
public function toggle($id)
{
    $model = new \App\Models\TodoModel();

    $task = $model->find($id);

    if (!$task) {
        return redirect()->to('/');
    }

    // toggle status
    $newStatus = ($task['status'] == 1) ? 0 : 1;

    $model->update($id, [
        'status' => $newStatus
    ]);

    return redirect()->to('/');
}
}