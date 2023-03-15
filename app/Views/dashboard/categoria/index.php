<?= $this->extend('Layouts/dashboard') ?>
<?= $this->section('contenido') ?>

<a href="/dashboard/Categoria/new/">Crear</a>
    <table>
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
                    <a href="/dashboard/Categoria/show/<?= $value->id ?>">Show</a>
                    <a href="/dashboard/Categoria/edit/<?= $value->id ?>">Edit</a>
                    <form action="/dashboard/Categoria/delete/<?= $value->id ?>" method="POST">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

<?= $this->endSection() ?>