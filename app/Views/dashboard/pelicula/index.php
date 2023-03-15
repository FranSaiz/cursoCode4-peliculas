<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
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
                Opciones
            </th>
        </tr>   
        <?php foreach($peliculas as $key => $value) :?>
            <tr>
            <td> <?= $value['id'] ?> </td>
                <td> <?= $value['titulo'] ?> </td>
                <td> <?= $value['descripcion'] ?> </td>
                <td>
                    <a href="/dashboard/Pelicula/show/<?= $value['id'] ?>">Show</a>
                    <a href="/dashboard/Pelicula/edit/<?= $value['id'] ?>">Edit</a>
                    <form action="/dashboard/Pelicula/delete/<?= $value['id'] ?>" method="POST">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

</body>
</html>