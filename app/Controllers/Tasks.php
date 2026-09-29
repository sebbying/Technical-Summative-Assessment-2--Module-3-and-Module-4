<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    private const RULES = [
        'title' => 'required|min_length[3]|max_length[150]',
        'task_date' => 'required|valid_date[Y-m-d]',
        'description' => 'permit_empty|max_length[2000]',
        'status' => 'required|in_list[pending,in_progress,done]',
    ];

    public function index()
    {
        return view('tasks/index', [
            'tasks' => (new TaskModel())->active()->orderBy('task_date', 'ASC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('tasks/form', ['task' => null]);
    }

    public function create()
    {
        if (! $this->validateData($this->request->getPost(), self::RULES)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->insert($this->taskData());
        return redirect()->to(site_url('tasks'))->with('success', 'Task created.');
    }

    public function edit(int $id)
    {
        return view('tasks/form', ['task' => $this->findActive($id)]);
    }

    public function update(int $id)
    {
        $this->findActive($id);
        if (! $this->validateData($this->request->getPost(), self::RULES)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new TaskModel())->update($id, $this->taskData());
        return redirect()->to(site_url('tasks'))->with('success', 'Task updated.');
    }

    public function archive(int $id)
    {
        $this->findActive($id);
        (new TaskModel())->update($id, ['is_archived' => 1]);
        return redirect()->to(site_url('tasks'))->with('success', 'Task archived.');
    }

    private function findActive(int $id): array
    {
        $task = (new TaskModel())->active()->find($id);
        if (! $task) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }
        return $task;
    }

    private function taskData(): array
    {
        return [
            'title' => trim((string) $this->request->getPost('title')),
            'description' => trim((string) $this->request->getPost('description')),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status'),
        ];
    }
}
