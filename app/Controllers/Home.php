<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/home', [
            'tasks' => (new TaskModel())->active()->orderBy('task_date', 'ASC')->findAll(5),
        ]);
    }

    public function about()
    {
        return view('pages/about');
    }

    public function profile()
    {
        return view('pages/profile');
    }
}
