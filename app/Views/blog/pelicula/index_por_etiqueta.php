<?= $this->extend('Layouts/blog') ?>
<?= $this->section('contenido') ?>

<h1>Películas por etiqueta: <?= $etiqueta ?></h1>
<hr>

<?= view('partials/_peliculas') ?>     

<?= $this->endSection() ?>