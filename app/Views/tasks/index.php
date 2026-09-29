<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Task List<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="section-head"><div><p class="eyebrow">STAY ORGANIZED</p><h1>Task List</h1></div>
<?php if (session()->get('user_id')): ?><a class="button" href="<?= site_url('tasks/new') ?>">+ New task</a><?php endif ?></div>
<?php if (! $tasks): ?><p>No active tasks yet.</p><?php else: ?><div class="cards">
<?php foreach ($tasks as $task): ?><article class="card">
    <span class="badge"><?= esc(str_replace('_', ' ', $task['status'])) ?></span><h2><?= esc($task['title']) ?></h2>
    <p><?= nl2br(esc($task['description'] ?? '')) ?></p><small>Due <?= esc($task['task_date']) ?></small>
    <?php if (session()->get('user_id')): ?><div class="actions"><a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">Edit</a>
    <form method="post" action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>" onsubmit="return confirm('Archive this task?')">
    <?= csrf_field() ?><button class="link-button danger" type="submit">Archive</button></form></div><?php endif ?>
</article><?php endforeach ?></div><?php endif ?>
<?= $this->endSection() ?>
