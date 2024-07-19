<style>
    @media (max-width: 767px) {
        .display{
            display: block !important;
        }
    }
    @media (min-width: 768px) {
        .display{
            display: none !important;
        }
    }
</style>
<?php $_SESSION['user_type'] = 0; ?>
<link rel="icon" href="favicon.ico" type="image/gif">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Artists Profile</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php $base_name = basename($_SERVER['PHP_SELF']); ?>
       <?php if($base_name == 'home.php')
        { $active = 'active'; } else { $active = '';} ?>
        <li class="<?php echo $active; ?> display"><a href="home.php">Home<span class="sr-only">(current)</span></a></li>
        <?php if($_SESSION['user_type'] != '1')
              {
            if($base_name == 'dashboard.php')
        { $active = 'active'; } else { $active = '';} ?>
        <li class="<?php echo $active; ?> display"><a href="dashboard.php">My Task<span class="sr-only">(current)</span></a></li>
              <?php } ?>

                <li><a href="logout.php">Logout</a></li>
            </ul>
            
        </div>
    </div>
</nav>