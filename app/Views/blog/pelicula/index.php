<?= $this->extend('Layouts/blog') ?>
<?= $this->section('contenido') ?>

<h1>Películas</h1>
<hr>
<div class="card my-3 text-bg-primary">
    <div class="card-body">
        <form method="get">
            <div class="d-flex gap-2">
                <select class="form-control flex-grow-1 categoria_id" name="categoria_id">
                    <option value="">Categoria</option>
                    <?php foreach($categorias as $c) : ?>
                        <option <?= $c->id !== $categoria_id ?: 'selected' ?> value="<?= $c->id ?>"><?= $c->titulo ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="form-control etiqueta_id" name="etiqueta_id">
                    <option value="">Etiqueta</option>
                    <?php foreach($etiquetas as $e) : ?>
                        <option <?= $e->id !== $etiqueta_id ?: 'selected' ?> value="<?= $e->id ?>"><?= $e->titulo ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="d-flex gap-2 mt-2">
                <input placeholder="Buscar..." class="form-control" type="text" name="buscar" value=<?= $buscar ?>>
                <input class="btn btn-success" type="submit" value="Enviar">
                <a class="btn btn-secondary" href="<?= route_to('blog.pelicula.index') ?>">Limpiar</a>
            </div>
        </form>
    </div>
</div>

<?php foreach($peliculas as $p) :?>
<div class="card mb-3">
    <div class="card-body">
        
        <?php if($p->imagen != '') :?>
            <img class="w-25" src="/uploads/peliculas/<?= $p->imagen ?>">
        <?php endif ?>

        <h4><?= $p->titulo."<br>" ?></h4>
        <a href="" class="btn btn-secondary btn-sm"><?= $p->categoria ?></a>        
        <p><?= $p->descripcion."<br>" ?></p>
        <span class=""><?= $p->etiquetas ?></span>
        <a class="btn btn-primary" href=<?= route_to('blog.pelicula.show', $p->id) ?>>Ver</a>
    </div>
</div>
<?php endforeach ?>
<?= $pager->links() ?>

<script>
        
    document.querySelector('.categoria_id').addEventListener('change', () => {
        fetch('/blog/etiquetas_por_categoria/' + document.querySelector('.categoria_id').value)
        .then(res => res.json())
        .then(respuesta => {
            console.log(respuesta);

            var etiquetas = '<option value="">Etiqueta</option>';

            respuesta.forEach((e) => {
                etiquetas +=`
                <option value="${e.id}">${e.titulo}</option>                
                `            
            })

            document.querySelector('.etiqueta_id').innerHTML = etiquetas;
            
        })
       
    });
    
</script>

<?= $this->endSection() ?>