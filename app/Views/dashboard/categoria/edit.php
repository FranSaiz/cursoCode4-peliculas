<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
    <?= view('partials/_session') ?>
    <form action="/dashboard/Categoria/update/<?= $categoria['id'] ?>" method="POST">
        <?= view('/dashboard/categoria/_form', ['op' => 'Actualizar']); ?>
    </form>
<?= $this->endSection() ?>