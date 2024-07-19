<div class="col-sm-3 col-md-2 sidebar">

    <ul class="nav nav-sidebar">
        <?php $base_name = basename($_SERVER['PHP_SELF']); ?>
       
        <?php if($_SESSION['user_type'] != '1')
              {
            if($base_name == 'adminhome.php')
        { $active = 'active'; } else { $active = '';} ?>
        <li class="<?php echo $active; ?>"><a href="adminhome.php">Artists<span class="sr-only">(current)</span></a></li>
              <?php } ?>
        <?php if($base_name == 'trips.php')
        { $active = 'active'; } else { $active = '';} ?>
        <li class="<?php echo $active; ?>"><a href="trips.php">Trips & Allocations<span class="sr-only">(current)</span></a></li>
        <?php if($base_name == 'event.php')
        { $active = 'active'; } else { $active = '';} ?>
        <li class="<?php echo $active; ?>"><a href="event.php">Events<span class="sr-only">(current)</span></a></li>

    </ul>
</div>