 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Dashboard</title>
 </head>
 <body>
    <h1>Módulo de Dashboard</h1>
    <?= view('partials/_session') ?>
    <?= $this->renderSection('contenido') ?>
 </body>
 </html>