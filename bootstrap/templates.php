<?php
session_start();
include('config.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sales Person</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        td:nth-child(1) {
    padding-right: 20px;
}
td:nth-child(2) {
    padding-right: 20px;
}

textarea.form-control {
    /* height: auto; */
    height: 80px !important;
}
table{
    width: 800px;
}

</style>
  </head>
  
  <body>

    <?php      include 'header.php'; ?>
      
    <div class="container-fluid">
      <div class="row">
        <!-- side bar -->
        <?php      include 'sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Templates</h1>
          <?php
          
          $select = mysql_query("select * from templates");
          while($row = mysql_fetch_array($select))
          {
             if($row['category_name'] == 'newbies')
            {
              $new_email = $row['email'];
              $new_sms = $row['sms'];
              $new_temp = $row['template_id'];
            } 
              
            if($row['category_name'] == 'keen')
            {
              $keen_email = $row['email'];
              $keen_sms = $row['sms'];
              $keen_temp = $row['template_id'];
            }
            if($row['category_name'] == 'reviewing')
            {
               $reviewing_email = $row['email'];
              $reviewing_sms = $row['sms'];
              $reviewing_temp = $row['template_id'];
            }
            if($row['category_name'] == 'callback')
            {
                $callback_email = $row['email'];
              $callback_sms = $row['sms'];
              $callback_temp = $row['template_id'];
            }
            if($row['category_name'] == 'no')
            {
                $no_email = $row['email'];
              $no_sms = $row['sms'];
              $no_temp = $row['template_id'];
            }
            if($row['category_name'] == 'success')
            {
                $success_email = $row['email'];
              $success_sms = $row['sms'];
              $success_temp = $row['template_id'];
            }
            
          }
          
          
          ?>
          <div class="row">
              <form action="templates_db.php" method="post" enctype="multipart/form-data">
                  <div class="input-group">
                          
                          <table cellspacing="10">
                              <tr>
                                
                                  <th>SMS Template</th>
                                  <th style="padding-left:29%;">MailChimp Template ID</th>
                              </tr>
                          </table>
                          
                      </div><!-- /input-group -->
                      <div class="input-group">
                          
                         <h2>Newbies</h2>
                          <table cellspacing="10">
                              <tr>
<!--                                  <td><textarea class="form-control" name="keen_email" rows="3"  placeholder="Email"><?php echo $keen_email; ?></textarea></td>-->
                                  <td><textarea class="form-control" name="new_sms" rows="3"  placeholder="SMS"><?php echo $new_sms; ?></textarea></td>
                                  <td><textarea class="form-control" name="new_temp" rows="3" title="Template ID"  placeholder="Template ID"><?php echo $new_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div>
                      <div class="input-group">
                          
                         <h2>Keen</h2>
                          <table cellspacing="10">
                              <tr>
<!--                                  <td><textarea class="form-control" name="keen_email" rows="3"  placeholder="Email"><?php echo $keen_email; ?></textarea></td>-->
                                  <td><textarea class="form-control" name="keen_sms" rows="3"  placeholder="SMS"><?php echo $keen_sms; ?></textarea></td>
                                  <td><textarea class="form-control" name="keen_temp" rows="3" title="Template ID"  placeholder="Template ID"><?php echo $keen_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div><!-- /input-group -->
                      <div class="input-group">
                         <h2>Reviewing</h2>
                          <table cellspacing="10">
                              <tr>
<!--                              <td><textarea class="form-control" name="review_email" rows="3"  placeholder="Email"><?php echo $reviewing_email; ?></textarea></td>-->
                              <td><textarea class="form-control" name="review_sms" rows="3"  placeholder="SMS"><?php echo $reviewing_sms; ?></textarea></td>
                              <td><textarea class="form-control" name="review_temp" rows="3"  placeholder="Template ID"><?php echo $reviewing_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div>
                      <div class="input-group">
                         <h2>Call Us Back</h2>
                          <table cellspacing="10">
                              <tr>
<!--                              <td><textarea class="form-control" name="callback_email" rows="3"  placeholder="Email"><?php echo $callback_email; ?></textarea></td>-->
                                  <td><textarea class="form-control" name="callback_sms" rows="3"  placeholder="SMS"><?php echo $callback_sms; ?></textarea></td>
                                  <td><textarea class="form-control" name="callback_temp" rows="3"  placeholder="Template ID"><?php echo $callback_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div>
<!--                      <div class="input-group">
                         <h2>No</h2>
                          <table cellspacing="10">
                              <tr>
                              <td><textarea class="form-control" name="no_email" rows="3"  placeholder="Email"><?php echo $no_email; ?></textarea></td>
                                  <td><textarea class="form-control" name="no_sms" rows="3"  placeholder="SMS"><?php echo $no_sms; ?></textarea></td>
                                  <td><textarea class="form-control" name="no_temp" rows="3"  placeholder="Template ID"><?php echo $no_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div>-->
<!--                      <div class="input-group">
                         <h2>Success</h2>
                          <table cellspacing="10">
                              <tr>
                              <td><textarea class="form-control" name="success_email" rows="3"  placeholder="Email"><?php echo $success_email; ?></textarea></td>
                                  <td><textarea class="form-control" name="success_sms" rows="3"  placeholder="SMS"><?php echo $success_sms; ?></textarea></td>
                                  <td><textarea class="form-control" name="success_temp" rows="3"  placeholder="Template ID"><?php echo $success_temp; ?></textarea></td>
                              </tr>
                          </table>
                          
                      </div>-->
                      <br>
                      <div class="input-group">
                          <table cellspacing="10">
                              <tr><td> <button type="submit" class="btn btn-success">Submit</button></td></tr>
                          </table>
                      </div>
                </form>
          </div>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     
    
  </body>
</html>
