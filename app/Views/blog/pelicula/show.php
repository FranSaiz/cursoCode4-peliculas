<?= $this->extend('Layouts/blog') ?>
<?= $this->section('contenido') ?>

<div class="card">
    <div class="card-body">
        <h1><?= $pelicula->titulo ?></h1>
        <hr>
        <a target="_blank" href="<?= route_to('blog.pelicula.index_por_categoria', $pelicula->categoria_id) ?>" class="btn btn-primary"><?= $pelicula->categoria ?></a>
        <p><?= $pelicula->descripcion ?></p>
        <h3>Imágenes</h3>
        <?php foreach($imagenes as $i) : ?>
        <div class="d-flex gap-3">
            <img src="/uploads/peliculas/<?= $i->imagen ?>" alt="" class="mb-3 w-25">
            <div class="flex grow-1 mt-3">
                <form action="<?= route_to('pelicula.descargar_imagen', $i->id) ?>" method="GET">
                    <button type="submit" class="btn btn-success mt-1">Descargar</button>
                </form>
                <button class="mostrarDatos btn btn-success mt-1">Mostrar datos</button>
                <script>
                    var boton = document.querySelectorAll(".mostrarDatos").forEach((b) => {
                        b.onclick = function (event) {
                            console.log(<?= $i->data ?>);
                        }
                    });
                </script>
                <form action="<?= route_to('pelicula.borrar_imagen', $i->id) ?>" method="POST">
                    <button type="submit" class="btn btn-danger mt-1 ">Borrar</button>
                </form>
            </div>
        </div>
        <hr>
        <?php endforeach ?>
        <h3>Etiquetas</h3>
        <?php foreach($etiquetas as $e) :?>
            <a href="<?= route_to('blog.pelicula.index_por_etiqueta', $e->id) ?>" class="btn btn-primary"><?= $e->titulo ?></a>
        <?php endforeach ?>
    </div>
</div>



<?= $this->endSection() ?>