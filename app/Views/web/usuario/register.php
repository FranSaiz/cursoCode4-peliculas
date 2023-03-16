<?= $this->extend('Layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>

<form action="<?= route_to('usuario.registerPost') ?>" method="POST">
    <label for="usuario">Nombre de usuario</label>
    <input type="text" name="usuario" id="usuario" placeholder='Nombre de usuario'> 
    <label for="email">Correo electrónico</label>
    <input type="email" name="email" id="email" placeholder='Correo electrónico'>
    <label for="clave">Contraseña</label>
    <input type="password" name="clave" id="clave" placeholder='Contraseña'>
    <button type="submit" name="enviar" id="enviar" value="Enviar">Enviar</button>
</form>

<?= $this->endSection() ?>