<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>
<?= $this->section('header') ?>
    <h1>Listado de categorías</h1>
<?= $this->endSection() ?>

<a href="/dashboard/Categoria/new/" class="btn btn-success btn-lg mb-4">Crear</a>
    <table class="table table-hover">
        <tr>
            <th>
                Id
            </th>
            <th>
                Titulo
            </th>
            <th>
                Opciones
            </th>
        </tr>   
        <?php foreach($categorias as $key => $value) :?>
            <tr>
            <td> <?= $value->id ?> </td>
                <td> <?= $value->titulo ?> </td>
                <td>
                    <a href="/dashboard/Categoria/show/<?= $value->id ?>" class="btn btn-secondary btn-sm">Show</a>
                    <a href="/dashboard/Categoria/edit/<?= $value->id ?>" class="btn btn-primary btn-sm">Edit</a>
                    <form action="/dashboard/Categoria/delete/<?= $value->id ?>" method="POST">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

<?= $pager->links() ?>
<?= $this->endSection() ?>