<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <a href="Categoria/new/">Crear</a>
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
            <td> <?= $value['id'] ?> </td>
                <td> <?= $value['titulo'] ?> </td>
                <td>
                    <a href="/Categoria/show/<?= $value['id'] ?>">Show</a>
                    <a href="/Categoria/edit/<?= $value['id'] ?>">Edit</a>
                    <form action="/Categoria/delete/<?= $value['id'] ?>" method="POST">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>