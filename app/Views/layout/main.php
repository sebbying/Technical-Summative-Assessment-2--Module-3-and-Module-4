<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($this->renderSection('title') ?: 'Tasks for Today') ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<header class="site-header"><nav class="container nav" aria-label="Main navigation">
    <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
    <div class="links">
        <a href="<?= site_url('/') ?>">Welcome</a>
        <a href="<?= site_url('tasks') ?>">Task List</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
        <?php if (session()->get('user_id')): ?>
            <form class="inline" action="<?= site_url('logout') ?>" method="post"><?= csrf_field() ?><button class="link-button" type="submit">Log out</button></form>
        <?php else: ?>
            <a href="<?= site_url('login') ?>">Log in</a>
        <?php endif ?>
    </div>
</nav></header>
<main class="container content">
    <?php if (session()->getFlashdata('success')): ?><p class="notice success" role="status"><?= esc(session()->getFlashdata('success')) ?></p><?php endif ?>
    <?php if (session()->getFlashdata('error')): ?><p class="notice error" role="alert"><?= esc(session()->getFlashdata('error')) ?></p><?php endif ?>
    <?= $this->renderSection('content') ?>
</main>
<footer class="container footer">IT0049 • Tasks for Today</footer>
</body>
</html>
