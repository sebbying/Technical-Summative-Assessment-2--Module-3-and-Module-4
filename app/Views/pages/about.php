<?= $this->extend('layout/main') ?>
<?= $this->section('title') ?>About<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1>About this project</h1><p>Tasks for Today is a CodeIgniter 4 project for keeping track of daily work. Anyone can browse active tasks. Signed-in users can add, edit, and archive them.</p>
<p>Archived tasks stay in the database but are hidden from public task lists.</p>
<?= $this->endSection() ?>
