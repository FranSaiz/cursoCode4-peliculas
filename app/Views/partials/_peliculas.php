<?php foreach($peliculas as $p) :?>
<div class="card mb-3">
    <div class="card-body">        
        <?php if($p->imagen != '') :?>
            <img class="w-25" src="/uploads/peliculas/<?= $p->imagen ?>">
        <?php endif ?>

        <h4><?= $p->titulo."<br>" ?></h4>
        <a href="<?= route_to('blog.pelicula.index_por_categoria', $p) ?>" class="btn btn-secondary btn-sm">     
        <p><?= $p->descripcion."<br>" ?></p>
        <span class=""><?= $p->etiquetas ?></span>
        <a class="btn btn-primary" href=<?= route_to('blog.pelicula.show', $p->id) ?>>Ver</a>
    </div>
</div>
<?php endforeach ?>
<?= $pager->links() ?>