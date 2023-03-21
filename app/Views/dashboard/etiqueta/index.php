<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?= $this->section('header') ?>
    <h1>Listado de etiquetas</h1>
<?= $this->endSection() ?>

    <?php //echo $nombreVariableVista; ?>
    <?= view('partials/_session') ?>
    <a href="/dashboard/Etiqueta/new/" class="btn btn-success btn-lg mb-4">Crear</a>
    <table class="table table-hover">
        <tr>
            <th>
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Categoría
            </th>
            <th>
                Opciones
            </th>
        </tr>   
        <?php foreach($etiquetas as $key => $value) :?>
            <tr>
            <td> <?= $value->id ?> </td>
                <td> <?= $value->titulo ?> </td>
                <td> <?= $value->categoria ?> </td>
                <td>
                    <a href="/dashboard/Etiqueta/show/<?= $value->id ?>" class="btn btn-secondary btn-sm mt-2">Show</a>
                    <a href="/dashboard/Etiqueta/edit/<?= $value->id ?>" class="btn btn-primary btn-sm mt-2">Edit</a>
                    <a href="<?= route_to('etiqueta.etiquetas', $value->id) ?>" class="btn btn-primary btn-sm mt-2">Tags</a>
                    <form action="/dashboard/Etiqueta/delete/<?= $value->id ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm mt-1">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    
<?= $pager->links() ?>
<?php $this->endSection() ?> 