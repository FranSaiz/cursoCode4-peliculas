<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('header') ?>
    <h1>Listado de películas</h1>
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>


    

    <?php //echo $nombreVariableVista; ?>
    <?= view('partials/_session') ?>
    <a href="/dashboard/Pelicula/new/" class="btn btn-success btn-lg mb-4">Crear</a>
    <table class="table table-hover">
        <tr>
            <th>
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Descripción
            </th>
            <th>
                Categoría
            </th>
            <th>
                Opciones
            </th>
        </tr>   
        <?php foreach($peliculas as $key => $value) :?>
            <tr>
            <td> <?= $value->id ?> </td>
                <td> <?= $value->titulo ?> </td>
                <td> <?= $value->descripcion ?> </td>
                <td> <?= $value->categoria ?> </td>
                <td>
                    <a href="/dashboard/Pelicula/show/<?= $value->id ?>" class="btn btn-secondary btn-sm mt-2">Show</a>
                    <a href="/dashboard/Pelicula/edit/<?= $value->id ?>" class="btn btn-primary btn-sm mt-2">Edit</a>
                    <a href="<?= route_to('pelicula.etiquetas', $value->id) ?>" class="btn btn-primary btn-sm mt-2">Tags</a>
                    <form action="/dashboard/Pelicula/delete/<?= $value->id ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm mt-1">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    
<?= $pager->links() ?>
<?= $this->endSection() ?>