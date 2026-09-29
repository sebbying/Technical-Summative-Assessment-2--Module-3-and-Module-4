<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?><?= $task ? 'Edit Task' : 'New Task' ?><?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<div class="form-wrap"><h1><?= $task ? 'Edit task' : 'New task' ?></h1>
<form class="panel" method="post" action="<?= $task ? site_url('tasks/' . $task['id']) : site_url('tasks') ?>">
    <?= csrf_field() ?>
    <label for="title">Title *</label><input id="title" name="title" maxlength="150" required value="<?= esc(old('title', $task['title'] ?? '')) ?>">
    <?php if (isset($errors['title'])): ?><small class="field-error"><?= esc($errors['title']) ?></small><?php endif ?>
    <label for="task_date">Task date *</label><input id="task_date" type="date" name="task_date" required value="<?= esc(old('task_date', $task['task_date'] ?? '')) ?>">
    <?php if (isset($errors['task_date'])): ?><small class="field-error"><?= esc($errors['task_date']) ?></small><?php endif ?>
    <label for="description">Description</label><textarea id="description" name="description" rows="5" maxlength="2000"><?= esc(old('description', $task['description'] ?? '')) ?></textarea>
    <?php if (isset($errors['description'])): ?><small class="field-error"><?= esc($errors['description']) ?></small><?php endif ?>
    <label for="status">Status</label><select id="status" name="status">
    <?php foreach (['pending' => 'Pending', 'in_progress' => 'In progress', 'done' => 'Done'] as $value => $label): ?>
    <option value="<?= esc($value) ?>" <?= old('status', $task['status'] ?? 'pending') === $value ? 'selected' : '' ?>><?= esc($label) ?></option>
    <?php endforeach ?></select>
    <?php if (isset($errors['status'])): ?><small class="field-error"><?= esc($errors['status']) ?></small><?php endif ?>
    <div class="actions"><button class="button" type="submit"><?= $task ? 'Save changes' : 'Create task' ?></button><a href="<?= site_url('tasks') ?>">Cancel</a></div>
</form></div>
<?= $this->endSection() ?>
