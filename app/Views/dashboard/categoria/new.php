<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
    
    <?= view('partials/_session') ?>
    <form action="/dashboard/Categoria/create" method="POST">
        <?= view('dashboard/categoria/_form', ['op' => 'Crear']); ?>
    </form>

<?= $this->endSection() ?>