<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoría</title>
</head>
<body>
<form action="dashboard/Categoria/update/<?= $categoria['id'] ?>" method="POST">
    <?= view('dashboard/categoria/_form', ['op' => 'Actualizar']); ?>
</form>
</body>
</html>