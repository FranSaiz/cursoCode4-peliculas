<label for="tituloPelicula">Titulo</label>
<input type="text" id="tituloPelicula" name="titulo" placeholder="Título" value="<?= $pelicula['titulo'] ?>">
<label for="descripcionPelicula">Descripción</label>
<textarea name="descripcion" id="descripcionPelicula" placeholder="Descripción">
    <?= $pelicula['descripcion'] ?>
</textarea>
<button type="submit"><?= $op ?></button>