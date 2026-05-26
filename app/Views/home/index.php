<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <?= $this->include('home/sections/hero') ?>
    <?= $this->include('home/sections/about') ?>
    <?= $this->include('home/sections/programs') ?>
    <?= $this->include('home/sections/achievements') ?>
    <?= $this->include('home/sections/ticket') ?>
    <?= $this->include('home/sections/gallery') ?>
    <?= $this->include('home/sections/contact') ?>
<?= $this->endSection() ?>