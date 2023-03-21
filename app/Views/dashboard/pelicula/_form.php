<div class="mb-3">
<label class="form-label" for="tituloPelicula">Titulo</label>
<input class="form-control" type="text" id="tituloPelicula" name="titulo" placeholder="Título" value="<?= old('titulo', $pelicula->titulo) ?>">
</div>

<div class="mb-3">
    <label class="form-label" for='categoria_id'>Categoría</label>
    <select class="form-control" name='categoria_id' id='categoria_id'>
        <option value=""></option>
        <?php foreach($categorias as $c) :?>

            <option <?= $c->id !== old('categoria_id', $pelicula->categoria_id) ?: 'selected' ?> value="<?= $c->id ?>"><?= $c->titulo ?></option>

        <?php endforeach ?>
    </select>
</div>

<div class="mb-3">
<label class="form-label" for="descripcionPelicula">Descripción</label>
<textarea class="form-control" name="descripcion" id="descripcionPelicula" placeholder="Descripción">
    <?= old('descripcion', $pelicula->descripcion) ?>
</textarea>


<?php if($pelicula->id): ?>
    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen">
<?php endif ?>

<button type="submit" class="btn btn-primary mt-3"><?= $op ?></button>
</div>