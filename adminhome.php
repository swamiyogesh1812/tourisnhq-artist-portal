<?php
session_start();

  include('dbconfig.php');
  
if(isset($_SESSION['user_id']))
{
    header('Location:index.php');
}
// else {
//     $user_id = $_SESSION['user_id'];
    
              
             
// }

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
    <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   
<link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
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

    <?php      include 'header.php'; $prj1 = 'default_value';
    
    ?>
      <div id="divLoading"> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- side bar -->
        <?php      include 'sidebar.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            
<!--            <h1 class="page-header">Artists</h1>-->
          
          <div class="row">
          <div class="table-responsive1">
              
              <table class="table table-condensed1" id="myTable">
                  <thead>
                  <tr class="hidden-row row<?php echo isset($prj1) ? $prj1 : 'default_value'; ?>">

<!--              <th>Project</th>    -->
                 <th></th>
              <th>DJ Name</th>
                  <th>Name</th>
<!--                  <th>FB ID</th>-->
                  <th>Event</th>
                  <th></th>
          </tr>
                  </thead>
              <tbody>
                  <?php
$sqlt3 = "SELECT * FROM artists WHERE directory = '1' ORDER BY sequence_num";
$queryt3 = mysqli_query($conn, $sqlt3);
$nort3 = mysqli_num_rows($queryt3);
if($nort3>0)
{
  $j=1;
  ?>
                  
            <?php
	while($row = mysqli_fetch_assoc($queryt3))
	{
            
               $event1 = 'BlueSky';
               $event2 = 'SpringBreak Fiji';
               $event3 = 'SpringBreak Raro';
               $event4 = 'SpringBreak Samoa';
               $event5 = 'SpringBreak Tonga';
                  ?>
             
                <tr id="<?php echo $row['id']; ?>" data-toggle="collapse1" data-target="#demo1<?php echo $j; ?>" class="accordion-toggle1 hidden-row row<?php echo $prj1; ?>">
                    <td data-toggle="collapse" data-target="#demo<?php echo $j; ?>" class="accordion-toggle hidden-row row<?php echo $prj1; ?>"><button class="btn btn-success btn_expand" style="height:26px;width:26px; padding: 0px;" value="expand">+</button> &nbsp; <button class="btn btn-warning" style="height:26px;width:26px;padding: 0px;" >-</button></td>
                    <td><?php echo $row['dj_name']; ?></td>
                    <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
                    
<!--                    <td><?php echo 'https://www.facebook.com/'.$row['fb_id']; ?></td>-->
                    <td><select id="select_event" class="select_change" data-id="<?php echo $row['id']; ?>"><?php
                 $query_category = mysqli_query($conn, "SELECT * FROM events");
                  echo '<option>Event</option>';
                  while ($row_categories = mysqli_fetch_array($query_category))
                  {
                      
                      if($row['event_id'] == $row_categories['name'] )
                      {
                      ?>                  
                          <option selected=""><?php echo $row_categories['name']; ?></option>
                  <?php } else { ?>
                        <option><?php echo $row_categories['name']; ?></option>  
                  <?php } } ?>
                      </select></td>
                      <td><a href="#" class="up" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-arrow-up"></span></a>
                          &nbsp;&nbsp;<a href="#" class="down" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-arrow-down"></span></a>&nbsp;&nbsp;<a href="#" class="delete" title="delete" style="color: red" data-id="<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
              <tr class="hidden-row">   
                  <td colspan="6" class="hiddenRow">
                      <div class="accordian-body collapse hiddenRow" id="demo<?php echo $j; ?>">
                    <table class="table table-condensed">
                    <tr><th>Firstname:</th><td style="color:black"><?php echo $row['fname']; ?></td></tr>
                    <tr><th>Lastname:</th><td style="color:black"><?php echo $row['lname']; ?></td></tr>
                    <tr><th>DJ/Stage Name:</th><td style="color:black"><?php echo $row['dj_name']; ?></td></tr>
                    <tr><th>Phone:</th><td style="color:black"><?php echo $row['phone']; ?></td></tr>
                        <tr><th>Email:</th><td style="color:black"><?php echo $row['email']; ?></td></tr>
                        <tr><th>Profile Image:</th><td style="color:black"> <a class="single_1" href="uploads/<?php echo substr($row['profile_pic'],6); ?>" title="Profile Image"><img src="uploads/<?php echo $row['profile_pic']; ?>" style="height:70px;width: 70px;"></a></td></tr>
                        <tr><th>Short Artists Bio:</th><td style="color:black"><?php echo $row['artists_bio']; ?></td></tr>
                        <tr><th>Your Personal Facebook Page:</th><td style="color:black"><a href="<?php echo $row['fb_page']; ?>"><?php echo $row['fb_page']; ?></a></td></tr> 
                        <tr><th>Your Artist Facebook Page:</th><td style="color:black"><a href="<?php echo $row['dj_fb_page']; ?>"><?php echo $row['dj_fb_page']; ?></a></td></tr> 
                        <tr><th>Your Instagram address:</th><td style="color:black"><a href="<?php echo $row['instagram']; ?>"><?php echo $row['instagram']; ?></a></td></tr>
                        <tr><th>Your Soundcloud or Mixcloud link:</th><td><a href="<?php echo $row['soundcloud']; ?>"><?php echo $row['soundcloud']; ?></a></td></tr>
                <tr><th>Do you regularly perform in NZ, if so at which venues and/or radio stations?</th><td style="color:black"><?php echo $row['perform_in_nz']; ?></td></tr>
                <tr><th>Have you been on a prior trip with us, if so which trip?</th><td style="color:black"><?php if($row['prior_trip']=='1'){echo 'Yes';}else{echo 'No'; } ?></td></tr>
                <tr><th style="width: 34%;">Are you a promoter, technician or involved in any other way with the music scene?</th><td style="color:black"><?php echo $row['is_promoter']; ?></td></tr>
                <tr><th>Is there a particular trip or location you'd like to perform at?</th><td style="color:black"><?php echo $row['priorities']; ?></td></tr>
                    </table>
                      </div>
                  </td>
              </tr>
        <?php $j++;  } } ?>
              </tbody>
            </table>
          </div>
          </div>
<!--  <?php
$sqlt3 = "SELECT * from artists";
$queryt3 = mysql_query($sqlt3);
$nort3 = mysql_num_rows($queryt3);
if($nort3>0)
{
  $j=1;
  ?>
                  
            <?php
	while($row = mysql_fetch_assoc($queryt3))
	{ ?>
                <div class="accordian-body collapse" id="demo<?php echo $j; ?>">
                    <table class="table">
                        <tr><th>Phone:</th><td style="color:black"><?php echo $row['phone']; ?></td></tr>
                        <tr><th>Email:</th><td style="color:black"><?php echo $row['email']; ?></td></tr>
                        <tr><th>Profile Image:</th><td style="color:black"><img src="uploads/<?php echo $row['profile_pic']; ?>" style="height: 100px;width: 100px"></td></tr>
                        <tr><th>Artists Bio:</th><td style="color:black"><?php echo $row['artists_bio']; ?></td></tr>
                        <tr><th>Personal Fb page:</th><td style="color:black"><a href="<?php echo $row['fb_page']; ?>"><?php echo $row['fb_page']; ?></a></td></tr> 
                        <tr><th>DJ Fb page:</th><td style="color:black"><a href="<?php echo $row['dj_fb_page']; ?>"><?php echo $row['dj_fb_page']; ?></a></td></tr> 
                        <tr><th>Instagram:</th><td style="color:black"><a href="<?php echo $row['instagram']; ?>"><?php echo $row['instagram']; ?></a></td></tr>
                        <tr><th>Sound Cloud:</th><td><a href="<?php echo $row['soundcloud']; ?>"><?php echo $row['soundcloud']; ?></a></td></tr>
                <tr><th>Perform in nz:</th><td style="color:black"><?php echo $row['perform_in_nz']; ?></td></tr>
                <tr><th>Prior Trip:</th><td style="color:black"><?php if($row['prior_trip']=='1'){echo 'Yes';}else{echo 'No'; } ?></td></tr>
                <tr><th>Are you promoter:</th><td style="color:black"><?php echo $row['is_promoter']; ?></td></tr>
                
                <?php
                $string = $row['priorities'];
                $searchReplaceArray = array(
  '1' => $event1, 
  '2' => $event2,
  '3' => $event3, 
  '4' => $event4,
  '5' => $event5
);
$result = str_replace(
  array_keys($searchReplaceArray), 
  array_values($searchReplaceArray), 
  $string
);

                ?>
                <tr><th>Preferred Location:</th><td style="color:black"><?php echo $result; ?></td></tr>
                
                
                    </table>
                </div>
<?php $j++; } } ?>      
                   
            
           -->
          
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
<!--    <script type="text/javascript" src="https://knockoutjs.com/downloads/knockout-2.2.0.js"></script>-->
    <script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
      <script>
      $(document).ready(function() {
    $(".single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          },
          openEffect  : 'elastic',
          closeEffect : 'elastic'
      });
  });
      </script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function(){
    $('#myTable').DataTable(
            {
        "order": [[0, "desc" ]],
        "paging":   false,
        "ordering" : false,
        "info":     false
    });
});
  </script>
  <script>
 var rowCount = $('#myTable tr').length;
 console.log(rowCount);
 var exact_row_count = (rowCount-1)/17;
 var tab = document.getElementById("myTable");
 var i;
    for(i=0;i<exact_row_count;i++)
    {
        var j = (2*i)+(1);
      console.log(tab.rows[j].id);  
    }
 
 $(".delete").click(function(){
    var id = $(this).data('id');
    if(confirm('Are you sure to delete?'))
    {
     $.ajax({
        type:'POST',
        data:{id: id,del:'yes'},
        url:'row_update.php',
        success:function(data) {
            location.reload();
            }
      }); 
    } else {
      console.log('No');   
    }
 });
 
    $(".up,.down").click(function(){
        var arr = [];
        var row = $(this).parents("tr:first");
        var row1 = $(this).closest('tr').next('tr');
     
        if ($(this).is(".up")) {
          row.insertBefore(row.prev().prev());
          row1.insertBefore(row1.prev().prev());
        } else if($(this).is(".down")) {
           row.insertAfter(row.next().next().next());
           row1.insertAfter(row1.next().next().next());
        } 
        var row_num = row.index();
        var row_id = $(this).data('id');
        
        console.log((row_num/2)+1);      
    var i;
    for(i=0;i<exact_row_count;i++)
    {
      var j = (2*i)+(1);
      console.log(tab.rows[j].id); 
      arr.push(tab.rows[j].id);
    }
    console.log(arr);
     $.ajax({
        type:'POST',
        data:{arr: arr},
        url:'row_update.php',
        success:function(data) {
            //location.reload();
            }
      });
    });

  </script>
    <script>
        
         $('.select_change').change(function(){
     //$("div#divLoading").addClass('show');
 var sel_text =  $(this).find('option:selected').text();
 var id = $(this).data('id');
 console.log(sel_text,id);

$.ajax({
    type:'POST',
    data:{categories: sel_text,id:id },
    url:'update_event.php',
    success:function(data) {
	//location.reload();
	}
  });
});
$('.btn_expand').click(function(){
  
  $('div').find('.accordian-body').removeClass("in");
    
//   var current_val = $(this).text();
//  
//   if(current_val == '+')
//   {
//       $(this).text(' - ');
//       
//   } else {
//       $(this).text('+');
//       
//   }
});

//         $( document ).on( 'click', '.show_btn', function () {
//           $(this).removeClass('show_btn');
//           $(this).addClass('hide_btn');
//           var id = $(this).data('id');
//           //alert(id);
//           //$('.hidden-row').show();
//           $(this).text('-');
//           $('.'+id).removeClass('hidden-row');
//           $('.'+id).show();
//           
//        });
//        $( document ).on( 'click', '.hide_btn', function () {
//   
//           $(this).removeClass('hide_btn');
//           $(this).addClass('show_btn');
//           var id = $(this).data('id');
//          // alert(id);
//           //$('.hidden-row').show();
//           $(this).text('+');
//           $('.'+id).addClass('hidden-row');
//           $('.'+id).hide();
//           
//        });
//        $("#checkAll").change(function () {
//    $("input:checkbox").prop('checked', $(this).prop("checked"));
//});

//$('.select_change').change(function(){
//     $("div#divLoading").addClass('show');
// var sel_text =  $(this).find('option:selected').text();
// var id = $(this).data('id');
// console.log(sel_text,id);
//
//$.ajax({
//    type:'POST',
//    data:{categories: sel_text,id:id },
//    url:'update_category.php',
//    success:function(data) {
//	location.reload();
//	}
//  });
//});

//$('.btn_notes').click(function(){
//   var btn_id = $(this).data('id');
//   var row_id = $(this).data('num');
//   var notes = $('#no_text'+btn_id).val();
//   $.ajax({
//    type:'POST',
//    data:{row_id: row_id,notes:notes },
//    url:'no_notes.php',
//    success:function(data) {
//	
//	}
//  });
//});
//$('.btn_other').click(function(){
//   var btn_id = $(this).data('id');
//   var row_id = $(this).data('num');
//   var notes = $('#other_text'+btn_id).val();
//   $.ajax({
//    type:'POST',
//    data:{row_id: row_id,notes:notes },
//    url:'no_notes.php',
//    success:function(data) {
//	
//	}
//  });
//});
     </script> 
    
      
  </body>
</html>
