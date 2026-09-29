<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Log in<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="form-wrap"><h1>Welcome back</h1><p>Sign in to manage tasks.</p>
<?php $errors = session()->getFlashdata('errors') ?? []; ?>
<form method="post" action="<?= site_url('login') ?>" class="panel">
    <?= csrf_field() ?>
    <label for="email">Email</label><input id="email" type="email" name="email" value="<?= esc(old('email')) ?>" required autocomplete="username">
    <?php if (isset($errors['email'])): ?><small class="field-error"><?= esc($errors['email']) ?></small><?php endif ?>
    <label for="password">Password</label><input id="password" type="password" name="password" required autocomplete="current-password">
    <?php if (isset($errors['password'])): ?><small class="field-error"><?= esc($errors['password']) ?></small><?php endif ?>
    <button class="button" type="submit">Sign in</button>
</form></div>
<?= $this->endSection() ?>
