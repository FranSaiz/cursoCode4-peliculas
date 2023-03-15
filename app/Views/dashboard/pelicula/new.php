<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>
    <?= view('partials/_session') ?>
    <form action="/dashboard/Pelicula/create" method="POST">
        <?= view('dashboard/pelicula/_form', ['op' => 'Crear']); ?>
    </form>
<?= $this->endSection() ?>