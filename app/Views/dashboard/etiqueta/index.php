<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etiquetas</title>
</head>
<body>
    <h1>Listado</h1>
    <?php //echo $nombreVariableVista; ?>
    <?= view('partials/_session') ?>
    <a href="/dashboard/Etiqueta/new/">Crear</a>
    <table>
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
                    <a href="/dashboard/Etiqueta/show/<?= $value->id ?>">Show</a>
                    <a href="/dashboard/Etiqueta/edit/<?= $value->id ?>">Edit</a>
                    <a href="<?= route_to('etiqueta.etiquetas', $value->id) ?>">Tags</a>
                    <form action="/dashboard/Etiqueta/delete/<?= $value->id ?>" method="POST">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>


</body>
</html>