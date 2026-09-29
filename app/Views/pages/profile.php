<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>Profile<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1>Profile</h1>
<?php if (session()->get('user_id')): ?><p>Signed in as <strong><?= esc(session()->get('user_name')) ?></strong>.</p>
<?php else: ?><p>This page is public. <a href="<?= site_url('login') ?>">Log in</a> to manage tasks.</p><?php endif ?>
<?= $this->endSection() ?>
