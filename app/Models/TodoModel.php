<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table = 'todos';
    protected $allowedFields = ['task','status','user_id'];
}