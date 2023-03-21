<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
    
    <h1><?= $pelicula->titulo ?></h1>
    <p><?= $pelicula->descripcion ?></p>

    <h3>Imágenes</h3>
    <ul>
        <?php foreach($imagenes as $i) : ?>
            <li>
                <img src="/uploads/peliculas/<?= $i->imagen ?>" alt="" width="200">
                <form action="<?= route_to('pelicula.borrar_imagen', $i->id) ?>" method="POST">
                    <button type="submit">Borrar</button>
                </form>
                <form action="<?= route_to('pelicula.descargar_imagen', $i->id) ?>" method="GET">
                    <button type="submit">Descargar</button>
                </form>
                <button class="mostrarDatos">Mostrar datos</button> 
                <script>
                    document.querySelectorAll(".mostrarDatos").forEach((b) => {
                        b.onclick = function(event) {
                            console.log(<?= $i->data ?>);
                        }   
                    });
                </script>
            </li>
        <?php endforeach ?>
    </ul>

    <h3>Etiquetas</h3>
    
    <?php foreach($etiquetas as $e) : ?>
        <!-- <form action="<?= route_to('pelicula.etiqueta_delete', $pelicula->id, $e->id) ?>" method="POST"> -->
            <button data-url='<?= route_to('pelicula.etiqueta_delete', $pelicula->id, $e->id) ?>' class="delete_etiqueta"><?= $e->titulo ?></button>
        <!-- </form> -->
    <?php endforeach ?>
    
    <script>
        document.querySelectorAll(".delete_etiqueta").forEach((b) => {
            //console.log(b.getAttribute('data-url'))

            b.onclick = function(event) {
                fetch(this.getAttribute('data-url'), {
                    method: 'POST'
                }).then(res => {
                    window.location.reload()
                    console.log(res)   
                })
            }
            
        });       


    </script>

<?= $this->endSection() ?>