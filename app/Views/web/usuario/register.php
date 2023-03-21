<?= $this->extend('Layouts/web') ?>

<?= $this->section('contenido') ?>
<?= view('partials/_form-error') ?>

<div class="container mt-3">
    <div class="card mx-auto d-block mt-5" style="max-width: 500px">
        <div class="card-header text-center">
            <h1>Registrarse</h1>
        </div>
        <div class="card-body">
            <form action="<?= route_to('usuario.registerPost') ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="usuario">Nombre de usuario</label>
                    <input class="form-control" type="text" name="usuario" id="usuario" placeholder='Nombre de usuario'> 
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Correo electrónico</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder='Correo electrónico'>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="clave">Contraseña</label>
                    <input class="form-control" type="password" name="clave" id="clave" placeholder='Contraseña'>
                </div>
                <div class="d-grid">
                    <button class="btn btn-block btn-primary" type="submit" name="enviar" id="enviar" value="Enviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>