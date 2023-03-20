<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>
    <?= view('partials/_session') ?>
    <form action="/dashboard/Etiqueta/update/<?= $etiqueta->id ?>" method="POST">
        <?= view('dashboard/etiqueta/_form', ['op' => 'Actualizar']); ?>
    </form>
<?= $this->endSection() ?>