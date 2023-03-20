<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>
    <?= view('partials/_session') ?>
    <form action="/dashboard/Pelicula/update/<?= $pelicula->id ?>" method="POST" enctype="multipart/form-data">
        <?= view('dashboard/pelicula/_form', ['op' => 'Actualizar']); ?>
    </form>
<?= $this->endSection() ?>