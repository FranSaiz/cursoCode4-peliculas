<div class="mb-3">
    <label class="form-label" for="tituloEtiqueta">Titulo</label>
    <input class="form-control" type="text" id="tituloEtiqueta" name="titulo" placeholder="Título" value="<?= old('titulo', $etiqueta->titulo) ?>">
</div>
<div class="mb-3">
    <label class="form-label" for='categoria_id'>Categoría</label>
    <select class="form-control mb-3" name='categoria_id' id='categoria_id'>
        <option value=""></option>
        <?php foreach($categorias as $c) :?>

            <option <?= $c->id !== old('categoria_id', $etiqueta->categoria_id) ?: 'selected' ?> value="<?= $c->id ?>"><?= $c->titulo ?></option>

        <?php endforeach ?>
    </select>

    <button type="submit" class="btn btn-primary"><?= $op ?></button>
</div>