<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>

    <h1>Listado</h1>
    <?php //echo $nombreVariableVista; ?>
    <?= view('partials/_session') ?>
    <a href="/dashboard/Pelicula/new/">Crear</a>
    <table>
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
                    <a href="/dashboard/Pelicula/show/<?= $value->id ?>">Show</a>
                    <a href="/dashboard/Pelicula/edit/<?= $value->id ?>">Edit</a>
                    <a href="<?= route_to('pelicula.etiquetas', $value->id) ?>">Tags</a>
                    <form action="/dashboard/Pelicula/delete/<?= $value->id ?>" method="POST">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    
<?= $pager->links() ?>
<?= $this->endSection() ?>