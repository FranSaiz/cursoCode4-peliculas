<?= $this->extend('Layouts/blog') ?>
<?= $this->section('contenido') ?>

<h1>Películas por categoría: <?= $categoria->titulo ?></h1>
<hr>

<?= view('partials/_peliculas') ?>     

<?= $this->endSection() ?>