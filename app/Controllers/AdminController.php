<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TodoModel;

class AdminController extends BaseController
{
    // ================= SECURITY =================
    private function checkAdmin()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')
                ->with('error', 'Access denied');
        }

        return null;
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        if ($check = $this->checkAdmin()) return $check;

        $todoModel = new TodoModel();
        $userModel = new UserModel();

        $data = [
            'totalUsers' => $userModel->countAll(),
            'totalTasks' => $todoModel->countAll(),
            'completed'  => $todoModel->where('status', 1)->countAllResults(),
            'pending'    => $todoModel->where('status', 0)->countAllResults(),
        ];

        return view('admin_dashboard', $data);
    }

    // ================= TASKS =================
    public function tasks()
    {
        if ($check = $this->checkAdmin()) return $check;

        $todoModel = new TodoModel();

        $data['todos'] = $todoModel
            ->select('todos.*, users.name as username')
            ->join('users', 'users.id = todos.user_id', 'left')
            ->orderBy('todos.id', 'DESC')
            ->findAll();

        return view('admin_tasks', $data);
    }

    // ================= USERS =================
    public function users()
    {
        if ($check = $this->checkAdmin()) return $check;

        $model = new UserModel();

        $data['users'] = $model->findAll();

        return view('admin_users', $data);
    }

    // ================= EDIT USER =================
    public function editUser($id)
    {
        if ($check = $this->checkAdmin()) return $check;

        $model = new UserModel();

        $data['user'] = $model->find($id);

        return view('admin_edit_user', $data);
    }

    // ================= UPDATE USER =================
    public function updateUser($id)
    {
        if ($check = $this->checkAdmin()) return $check;

        $model = new UserModel();

        $model->update($id, [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/admin/users')
            ->with('success', 'User updated successfully');
    }

    // ================= DELETE USER =================
    public function deleteUser($id)
    {
        if ($check = $this->checkAdmin()) return $check;

        $model = new UserModel();

        $model->delete($id);

        return redirect()->to('/admin/users')
            ->with('success', 'User deleted successfully');
    }
}