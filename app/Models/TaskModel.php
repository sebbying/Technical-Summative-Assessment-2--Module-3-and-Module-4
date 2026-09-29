<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'description', 'task_date', 'status', 'is_archived'];

    public function active()
    {
        return $this->where('is_archived', 0);
    }
}
