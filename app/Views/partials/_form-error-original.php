<?php if(session('validation')) :?>
    <div class="alert alert-danger">
        <?= session('validation')->listErrors() ?>
    </div>
    <br>
<?php endif ?>