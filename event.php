<?php
session_start();

include('dbconfig.php');

if (isset($_SESSION['user_id'])) {
    header('Location:index.php');
} 
// else {
//     $user_id = $_SESSION['user_id'];
// }

if(isset($_REQUEST['submit']))
{
    $event_name = $_REQUEST['event_name'];
    $event_temp = $_REQUEST['event_temp'];
    
    $query = mysql_query("insert into events values('','$event_name','$event_temp')");
}
if(isset($_REQUEST['update']))
{
  $edit_id = $_REQUEST['edit_id1'];
  $event_name = $_REQUEST['event_name'];
  $event_temp = $_REQUEST['event_temp'];
  mysql_query("update events set name = '$event_name',email_template='$event_temp' where id = '$edit_id'");
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

        <title>TourismHQ - Artist Portal</title>

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
    <style>
        h3{
            color: red;
        }
        #divLoading
        {
            display : none;
        }
        #divLoading.show
        {
            display : block;
            position : fixed;
            z-index: 100;
            background-image : url('bootstrap/Loading_icon.gif');
            background-color:#666;
            opacity : 0.4;
            background-repeat : no-repeat;
            background-position : center;
            left : 0;
            bottom : 0;
            right : 0;
            top : 0;
        }
        #loadinggif.show
        {
            left : 50%;
            top : 50%;
            position : absolute;
            z-index : 101;
            width : 32px;
            height : 32px;
            margin-left : -16px;
            margin-top : -16px;
        }

    </style>
    <!--  <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css">-->
    <body>

<?php include 'header.php'; ?>

        <div class="container">
            <div class="row">
                <!-- side bar -->
        <?php include 'sidebar.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Events</h1>
                    <?php
                    if(isset($_REQUEST['edit_id']))
                    {
                     $id = $_REQUEST['edit_id'];   
                    $query_select = mysql_query("select * from events where id = '$id'");
                    $row_select = mysql_fetch_array($query_select);
                    $event_name = $row_select['name'];
                    $event_temp = $row_select['event_temp'];
                    
                    }
                    else {
                      $event_name = '';
                    $event_temp = '';
                    
                    }
                    ?>
                    <div class="row">
                        <form method="post" action="event.php">
                            <div class="row">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-xs-2 col-form-label">Event Name</label>
                                    <div class="col-xs-5">
                                        <input class="form-control" name="event_name" type="text" placeholder="Event Name" value="<?php echo $event_name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-xs-2 col-form-label">Email Template</label>
                                    <div class="col-xs-5">
                                        <input class="form-control" name="event_temp" type="text" placeholder="Email Template" value="<?php echo $event_temp; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-xs-2 col-form-label"></label>
                                    <div class="col-xs-5">
                                        <?php if(isset($_REQUEST['edit_id']))
                                            { ?>
                                        <input type="hidden" name="edit_id1" value="<?php echo $id; ?>">
                                         <button type="submit" name="update" class="btn btn-primary">Update!</button>   
                                        <?php }else{ ?>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit!</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br><hr>
                    <div class="row">
                        <div class="table-responsive1">

                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Events</th>
                                        <th>Template</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                          $query_select = mysqli_query($conn, "SELECT * FROM events");
                          while ($row_select = mysqli_fetch_array($query_select)) 
                    {
                    $event_name = $row_select['name'];
                    $event_temp = $row_select['email_template'];
                    
                                    ?>
                                    <tr>
                                        <td><?php echo $event_name; ?></td>
                                        <td><?php echo $event_temp; ?></td>
                                       
                                        <td><a href="event.php?edit_id=<?php echo $row_select['id']; ?>" class="btn btn-primary btn-small"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                    </tr>
                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
        <script type="text/javascript" src="bootstrap/jquery.timeTo.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script type="text/javascript" src="http://knockoutjs.com/downloads/knockout-2.2.0.js"></script>



        <script>
            $("#checkAll").change(function () {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });

            $('.select_change').change(function () {
                $("div#divLoading").addClass('show');
                var sel_text = $(this).find('option:selected').text();
                var id = $(this).data('id');
                console.log(sel_text, id);

                $.ajax({
                    type: 'POST',
                    data: {categories: sel_text, id: id},
                    url: 'update_category.php',
                    success: function (data) {
                        location.reload();
                    }
                });
            });

            $('.btn_notes').click(function () {
                var btn_id = $(this).data('id');
                var row_id = $(this).data('num');
                var notes = $('#no_text' + btn_id).val();
                $.ajax({
                    type: 'POST',
                    data: {row_id: row_id, notes: notes},
                    url: 'no_notes.php',
                    success: function (data) {

                    }
                });
            });
            $('.btn_other').click(function () {
                var btn_id = $(this).data('id');
                var row_id = $(this).data('num');
                var notes = $('#other_text' + btn_id).val();
                $.ajax({
                    type: 'POST',
                    data: {row_id: row_id, notes: notes},
                    url: 'no_notes.php',
                    success: function (data) {

                    }
                });
            });
        </script> 

    </body>
</html>
