<?php
session_start();

  include('dbconfig.php');

if(isset($_SESSION['FBID']))
{
    header('Location:index.php');
}
// else {
//      $user_id = $_SESSION['FBID'];
// }
$user_id= '122106473678194399';
$query = mysqli_query($conn, "SELECT * FROM artists WHERE fb_id = '$user_id'");
$row = mysqli_fetch_array($query);
// $fb_id = $_SESSION['FBID'];
$fb_id = '122106473678194399';
$dj_name = $row['dj_name'];
$fname = $row['fname'];
$lname = $row['lname'];
$profile_pic  = $row['profile_pic'];
$soundcloud = $row['soundcloud'];
$instagram = $row['instagram'];
$prior_trip = $row['prior_trip'];
$largest_gig = $row['largest_gig'];
$priorities = explode(",",$row['priorities']);

$perform_in_nz = $row['perform_in_nz'];
if (isset($row['promoter'])) {
    $promoter = $row['promoter'];
} else {
    // Handle the case where 'promoter' is not set
    $promoter = 'default_value'; // or some other appropriate action
}


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
    <link href="bootstrap/timeTo.css" type="text/css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<!--  <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css">-->
  <body>

    <?php      include 'header.php'; ?>
      <div id="divLoading"> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- side bar -->
        <?php      include 'sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Profile</h1>
          <div class="row">
              
         </div>
          <form method="post" action="dashboarddb.php" enctype="multipart/form-data">
          <div class="row">
              <div class="form-group row">
                  <label for="example-text-input" class="col-xs-2 col-form-label">DJ Name</label>
                  <div class="col-xs-10">
                      <input class="form-control" name="dj_name" value="<?php echo $dj_name; ?>" type="text"
                      placeholder="Artisanal
kale" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-search-input" class="col-xs-2 col-form-label">First Name per passport</label>
                  <div class="col-xs-10">
                      <input class="form-control" name="fname" value="<?php echo $fname; ?>" type="text"
                             placeholder="First Name" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-email-input" class="col-xs-2 col-form-label">Surname per passport</label>
                  <div class="col-xs-10">
                      <input class="form-control" name="lname" type="text" value="<?php echo $lname; ?>"
                             placeholder="Surname">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-email-input" class="col-xs-2 col-form-label">Accreditation Photo</label>
                  <div class="col-xs-1"><img src="uploads/<?php echo $profile_pic; ?>" style="height: 10%"></div>
                  <div class="col-xs-9">
                      <input class="form-control" type="file" name="profile_pic" onchange="validate_fileupload(this.value);"  id="fileupload">
                      <input type="hidden" name="hidden_image" value="<?php echo $profile_pic; ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-url-input" class="col-xs-2 col-form-label">soundcloud or mixcloud link</label>
                  <div class="col-xs-10">
                      <input class="form-control" type="url" name="soundcloud" value="<?php echo $soundcloud; ?>"
                             placeholder="http://soundcloud.com"
                             id="example-url-input">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-2 col-form-label">Instagram address</label>
                  <div class="col-xs-10">
                      <input class="form-control" type="text" name="instagram" value="<?php echo $instagram; ?>"
                             placeholder="Instragram Link / ID"
                             id="example-tel-input">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-password-input" class="col-xs-2 col-form-label">Have you been on prior trip with us? </label>
                  <div class="col-xs-10">
                      <select class="form-control" name="prior_trip" id="example-password-input">
                          <?php if($prior_trip == 1)
                          { ?>
                          <option value="1" selected="">Yes</option>
                          <option value="0">No</option>
                          <?php }else{ ?>
                              <option value="1" >Yes</option>
                          <option value="0" selected="">No</option> 
                          <?php } ?>
                      </select>
                  </div>

              </div>
              <div class="form-group row">
                  <label for="example-number-input" class="col-xs-2 col-form-label">What's the largest gig you've played at in the last year?</label>
                  <div class="col-xs-10">
                      <input class="form-control" name="largest_gig" type="text" value="<?php echo $largest_gig; ?>"
                             id="example-number-input">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-datetime-local-input" class="col-xs-2 col-form-label">Rank in order where you'd like to play with us this year!! </label>
                  <div class="col-xs-10">

                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-date-input" class="col-xs-2 col-form-label">Priority 1</label>
                  <div class="col-xs-10">
                      <select class="form-control" id="example-password-input" name="priorities[]">
                          <?php $query_events = mysql_query("select * from events");
                          while($row_events = mysql_fetch_array($query_events))
                          { 
                              if($row_events['id'] == $priorities[0])
                              {
                              ?>
                          <option value="<?php echo $row_events['id']; ?>" selected=""><?php echo $row_events['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $row_events['id']; ?>"><?php echo $row_events['name']; ?></option>
                        <?php  } } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-month-input" class="col-xs-2 col-form-label">Priority 2</label>
                  <div class="col-xs-10">
                      <select class="form-control" id="example-password-input" name="priorities[]">
                          <?php $query_events = mysql_query("select * from events");
                          while($row_events = mysql_fetch_array($query_events))
                          { 
                              if($row_events['id'] == $priorities[1])
                              {
                              ?>
                          <option value="<?php echo $row_events['id']; ?>" selected=""><?php echo $row_events['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $row_events['id']; ?>"><?php echo $row_events['name']; ?></option>
                        <?php  } } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-week-input" class="col-xs-2 col-form-label">Priority 3</label>
                  <div class="col-xs-10">
                      <select class="form-control" id="example-password-input" name="priorities[]">
                          <?php $query_events = mysql_query("select * from events");
                          while($row_events = mysql_fetch_array($query_events))
                          { 
                              if($row_events['id'] == $priorities[2])
                              {
                              ?>
                          <option value="<?php echo $row_events['id']; ?>" selected=""><?php echo $row_events['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $row_events['id']; ?>"><?php echo $row_events['name']; ?></option>
                        <?php  } } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-time-input" class="col-xs-2 col-form-label">Priority 4</label>
                  <div class="col-xs-10">
                      <select class="form-control" id="example-password-input" name="priorities[]">
                          <?php $query_events = mysql_query("select * from events");
                          while($row_events = mysql_fetch_array($query_events))
                          { 
                              if($row_events['id'] == $priorities[3])
                              {
                              ?>
                          <option value="<?php echo $row_events['id']; ?>" selected=""><?php echo $row_events['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $row_events['id']; ?>"><?php echo $row_events['name']; ?></option>
                        <?php  } } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-time-input" class="col-xs-2 col-form-label">Priority 5</label>
                  <div class="col-xs-10">
                     <select class="form-control" id="example-password-input" name="priorities[]">
                          <?php $query_events = mysql_query("select * from events");
                          while($row_events = mysql_fetch_array($query_events))
                          { 
                              if($row_events['id'] == $priorities[4])
                              {
                              ?>
                          <option value="<?php echo $row_events['id']; ?>" selected=""><?php echo $row_events['name']; ?></option>
                          <?php } else { ?>
                          <option value="<?php echo $row_events['id']; ?>"><?php echo $row_events['name']; ?></option>
                        <?php  } } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-time-input" class="col-xs-2 col-form-label">Do you regularly perform in NZ, if so where?</label>
                  <div class="col-xs-10">
                      <input class="form-control" type="text" value="<?php echo $perform_in_nz; ?>" name="perform_in_nz"
                             id="example-time-input">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-password-input" class="col-xs-2 col-form-label">Are you also a promoter? </label>
                  <div class="col-xs-10">
                      <select class="form-control" id="example-password-input" name="is_promoter">
                          <?php if($promoter == 1)
                          { ?>
                          <option value="1" selected="">Yes</option>
                          <option value="0">No</option>
                          <?php }else{ ?>
                              <option value="1" >Yes</option>
                          <option value="0" selected="">No</option> 
                          <?php } ?>
                      </select>
                  </div>

              </div>
              <div class="form-group row">
                  <label for="example-password-input" class="col-xs-2 col-form-label"></label>
                  <div class="col-xs-10">
                      <button type="submit" class="btn btn-primary">Submit!</button>
                      <button type="reset" class="btn btn-default">Cancel</button>
                  </div>

              </div>

          </div>
          </form>
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
    <script type="text/javascript" src="bootstrap/jquery.timeTo.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="http://knockoutjs.com/downloads/knockout-2.2.0.js"></script>
<script>
        function validate_fileupload(fileName)
{
    console.log('change event');
    var allowed_extensions = new Array("jpg","png","gif","jpeg","bmp");
    var file_extension = fileName.split('.').pop(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            console.log('true');
            return true; // valid file extension
            
        }
    }
    alert("Invalid file format");
    $('#fileupload').val('');
console.log('fail');
    return false;
}
</script>
  </body>
</html>
