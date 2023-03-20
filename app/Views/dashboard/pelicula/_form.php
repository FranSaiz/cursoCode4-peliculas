<label for="tituloPelicula">Titulo</label>
<input type="text" id="tituloPelicula" name="titulo" placeholder="Título" value="<?= old('titulo', $pelicula->titulo) ?>">

<label for='categoria_id'>Categoría</label>
<select name='categoria_id' id='categoria_id'>
    <option value=""></option>
    <?php foreach($categorias as $c) :?>

        <option <?= $c->id !== old('categoria_id', $pelicula->categoria_id) ?: 'selected' ?> value="<?= $c->id ?>"><?= $c->titulo ?></option>

    <?php endforeach ?>
</select>

<label for="descripcionPelicula">Descripción</label>
<textarea name="descripcion" id="descripcionPelicula" placeholder="Descripción">
    <?= old('descripcion', $pelicula->descripcion) ?>
</textarea>
<button type="submit"><?= $op ?></button>