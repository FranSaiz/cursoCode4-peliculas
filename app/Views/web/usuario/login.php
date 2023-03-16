<?= $this->extend('Layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>

<form action="<?= route_to('usuario.loginPost') ?>" method="POST">
    <label for="email">Usuario/Email</label>
    <input type="text" name="email" id="email" placeholder='Email'> 
    <label for="clave">Contraseña</label>
    <input type="password" name="clave" id="clave" placeholder='Contraseña'>
    <button type="submit" name="enviar" id="enviar" value="Enviar">Enviar</button>
</form>


<?= $this->endSection() ?>