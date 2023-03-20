<?= $this->extend('Layouts/dashboard') ?>

<?= $this->section('contenido') ?> 
<form action="" method="POST">
    <label for="">Categorias</label>
    <select name='categoria_id' id='categoria_id'>
        <option value=""></option>
        <?php foreach($categorias as $c) :?>

            <option <?= $c->id != $categoria_id ?: 'selected' ?> value="<?= $c->id ?>"><?= $c->titulo ?></option>

        <?php endforeach ?>
    </select>

    <label for="">Etiquetas</label>
    <select name='etiqueta_id' id='etiqueta_id'>
        <option value=""></option>
        <?php foreach($etiquetas as $e) :?>

            <option value="<?= $e->id ?>"><?= $e->titulo ?></option>

        <?php endforeach ?>
    </select>

    <button type="submit" id="enviar">Enviar</button>

</form>

<script>

    function disabledEnableButton() {
        if(document.querySelector('[name=etiqueta_id]').value == '') {
            document.querySelector('#enviar').setAttribute('disabled', 'disabled');
        } else {
            document.querySelector('#enviar').removeAttribute('disabled');
        }
    }

    document.querySelector('[name=categoria_id]').onchange = function(event) {
        window.location.href = '<?= route_to('pelicula.etiquetas', $pelicula->id) ?>?categoria_id='+this.value
    };
    document.querySelector('[name=etiqueta_id]').onchange = function(event) {
        disabledEnableButton()
    };

    disabledEnableButton();

</script>
<?= $this->endSection() ?>