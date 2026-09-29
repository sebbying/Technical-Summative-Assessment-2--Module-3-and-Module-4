<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $email = trim((string) env('DEMO_EMAIL', 'demo@example.com'));
        $password = (string) env('DEMO_PASSWORD', '');
        if ($password === '' || strlen($password) < 12 || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \RuntimeException('Set DEMO_EMAIL and a DEMO_PASSWORD of at least 12 characters in .env before seeding.');
        }

        $users = $this->db->table('users');
        if (! $users->where('email', $email)->countAllResults()) {
            $users->insert([
                'name' => 'Demo User', 'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
        }

        if ($this->db->table('tasks')->countAllResults() === 0) {
            $this->db->table('tasks')->insertBatch([
                ['title' => 'Plan today’s priorities', 'description' => 'Choose the most important tasks.', 'task_date' => date('Y-m-d'), 'status' => 'pending', 'is_archived' => 0],
                ['title' => 'Review completed work', 'description' => 'Check what has been done.', 'task_date' => date('Y-m-d'), 'status' => 'in_progress', 'is_archived' => 0],
            ]);
        }
    }
}
