<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Welcome<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="hero"><p class="eyebrow">YOUR DAILY DASHBOARD</p><h1>Make today count.</h1>
<p>Keep your plans in one place and see what needs your attention.</p>
<a class="button" href="<?= site_url('tasks') ?>">View all tasks</a></section>
<div class="section-head"><h2>Upcoming tasks</h2><?php if (session()->get('user_id')): ?><a class="button secondary" href="<?= site_url('tasks/new') ?>">+ New task</a><?php endif ?></div>
<?php if (! $tasks): ?><p>No active tasks yet.</p><?php else: ?>
<div class="cards"><?php foreach ($tasks as $task): ?><article class="card">
    <span class="badge"><?= esc(str_replace('_', ' ', $task['status'])) ?></span>
    <h3><?= esc($task['title']) ?></h3><p><?= esc($task['description'] ?? '') ?></p><small>Due <?= esc($task['task_date']) ?></small>
</article><?php endforeach ?></div><?php endif ?>
<?= $this->endSection() ?>
