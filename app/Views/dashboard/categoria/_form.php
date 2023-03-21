<div class="mb-3">
    <label class="form-label" for="tituloCategoria">Titulo</label>
    <input class="form-control" type="text" id="tituloCategoria" name="titulo" placeholder="Título" value="<?= old('titulo', $categoria->titulo) ?>">
</div>
<button type="submit" class="btn btn-primary"><?= $op ?></button>