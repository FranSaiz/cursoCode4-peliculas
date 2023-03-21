<?php if(session('validation')) :?>
    <div class="container mt-4">
        <?php foreach(session('validation')->getErrors() as $e) :?>
            <div class="alert alert-danger ">
                <?= $e ?>
            </div>
        <?php endforeach ?>    
    </div>
<?php endif ?>