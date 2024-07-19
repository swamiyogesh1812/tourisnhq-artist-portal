<?php
session_start();

include('dbconfig.php');

if(isset($_SESSION['FBID']))
{
    header('Location:index.php');
}
// else {
//     $user_id = $_SESSION['FBID'];
    
//      $query = mysql_query("select * from artists where fb_id = '$user_id' and directory = '1'");
//      $num = mysql_num_rows($query);
//     if($num > 0)
//     {
//     if(!isset($_REQUEST['edit']))
//     {
//     header('Location:confirmation.php?id='.$user_id);
//     }
//     } 
// }
$upload_path = "uploads/";				
$user_id= '122106473678194399';
$thumb_width = "150";						
$thumb_height = "150";
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
    <link rel="icon" href="favicon.ico">

    <title>TourismHQ - Artist Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
    <link href="bootstrap/timeTo.css" type="text/css" rel="stylesheet"/>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
   <link rel="stylesheet" type="text/css" href="css/cropimage.css" />
<link type="text/css" href="css/imgareaselect-default.css" rel="stylesheet" />
<link rel="stylesheet" href="bootstrap/css/custom.css" />
<link href="css/font-awesome.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .col-form-label{
            text-align: right;
        }
        .set_align{
            margin-left: 14%;
        }
    </style>
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
  </head>
  
<!--  <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css">-->
  <body style="background:url(images/bg.jpg) no-repeat;background-position: center;background-size: 100% 100%; background-attachment: fixed;">
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">File Upload</h4>
        </div>
        <div class="modal-body">
         <center>
	<div class="crop_box">
<form class="uploadform" method="post" enctype="multipart/form-data" action='upload.php' name="photo">	
    <div class="crop_set_upload">
            
		<div class="crop_upload_label">Upload files: </div>
                <div class="crop_select_image"><div class="file_browser" style="margin-left: -37px;"><input type="file" name="imagefile" id="imagefile" class="hide_broswe" />
                    
                    </div></div>
                <div class="crop_select_image"><input type="submit" style="display:none" value="Upload" class="upload_button" name="submitbtn" id="submitbtn" /></div>
        </div>
</form>			
		<div class="crop_set_preview">
			<div class="crop_preview_left"> 
				<div class="crop_preview_box_big" id='viewimage'> 
					
				</div>
			</div>
			<div class="crop_preview_right">
				Preview (150x150 px)
				<div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
				
				<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
					<input type="hidden" name="wr" value="" id="wr" />
					
					<input type="hidden" name="filename" value="" id="filename" />
                                        <div class="crop_preview_submit"><button type="button" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button">Save Thumb</button> </div>
				</form>
				
			</div>
		</div>
	</div>
         </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <?php    //  include 'header.php'; ?>
      <div id="divLoading"> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- side bar -->
        <?php      //include 'sidebar.php'; ?>
<!--        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
<div class="col-md-12 main">
<!--          <h1 class="page-header">Your Profile</h1>-->
          <div class="row">
           <?php  $dj_name = '';
$fname = '';
$lname = '';
$profile_pic = 'me_black.png';
$soundcloud = '';
$instagram = '';
$prior_trip = '';
$largest_gig = '';
$priorities = '';
$artists_bio = '';
$dj_fb_page = '';
$perform_in_nz = '';
$promoter = '';
$fb_page = '';
$phone = '';
$email = '';
$criminal_convictions = '';
$specialize = '';
$track = '';
            $query = mysqli_query($conn, "SELECT * FROM artists WHERE fb_id = '$user_id' AND directory = '1'");
            $num = mysqli_num_rows($query);
           if($num > 0) 
           {
               
  $row = mysqli_fetch_array($query);
$fb_id = '122106473678194399';
$dj_name = $row['dj_name'];
$fname = $row['fname'];
$lname = $row['lname'];
$profile_pic  = $row['profile_pic'];
if($profile_pic == '')
{
    $profile_pic = 'me_black.png';
} 
$soundcloud = $row['soundcloud'];
$instagram = $row['instagram'];
$prior_trip = $row['prior_trip'];
$largest_gig = $row['largest_gig'];
$priorities = $row['priorities'];
$artists_bio = $row['artists_bio'];
$dj_fb_page = $row['dj_fb_page'];
$perform_in_nz = $row['perform_in_nz'];
$promoter = $row['is_promoter'];
$fb_page = $row['fb_page'];
$phone = $row['phone'];
$email = $row['email'];
$criminal_convictions = $row['criminal_convictions'];
$specialize = $row['specialize'];
$track = $row['track'];
           }
           else {
         $profile_pic = 'me_black.png';      
           }
           ?>
         </div>
          
          
          <form name="frmdetails" id="frm_edit" method="post" action="dashboarddb.php" >

         <div class="container" id="showdetails" style="width: 90%; padding: 0 0 0 0; ">        
		<div class="row centered">
        <div id="lg-whitebg" class="col-xs-12 col-md-12" >
        <div>
<!--header-->	      
        <p id="lg-header">ARTISTS DETAILS</p>
<!--header-->			

<!--top pagination-->			
		<div id="toppagination">
		<div class="col-xs-4 col-md-3 menu1" id="active_toppagination" >
		<span id="numcirc">1</span> Basic Details
        </div>	      
		<div class="col-xs-4 col-md-3 menu2" >
		<span id="numcirc">2</span> Profile & Bio
        </div>
		<div class="col-xs-4 col-md-3 menu3" >
		<span id="numcirc">3</span> Links
        </div>
		<div class="col-xs-4 col-md-3 menu4" >
		<span id="numcirc">4</span> Preference
        </div>
        </div>
<!--top pagination-->		
		
    

			
<div id="pad50" class="tab1">      
         <div class="row">
              <div class="form-group row">
                  <label for="example-text-input" class="col-xs-6 col-md-4 col-form-label">DJ / Stage Name</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" name="dj_name" id="dj_name" value="<?php echo $dj_name; ?>" type="text"
                      placeholder="Stage Name" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-search-input" class="col-xs-6 col-md-4 col-form-label">First Name per passport</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" name="fname" id="fname" value="<?php echo $fname; ?>" type="text"
                             placeholder="First Name" >
                  </div>
              </div>
             <div class="form-group row">
                  <label for="example-email-input" class="col-xs-6 col-md-4 col-form-label">Surname per passport</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" name="lname" id="lname" type="text" value="<?php echo $lname; ?>"
                             placeholder="Surname">
                  </div>
              </div>
               <div class="form-group row">
                  <label for="example-email-input" class="col-xs-6 col-md-4 col-form-label">Phone</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" name="phone" id="phone" type="text" value="<?php echo $phone; ?>"
                             placeholder="Phone">
                  </div>
              </div>
               <div class="form-group row">
                  <label for="example-email-input" class="col-xs-6 col-md-4 col-form-label">Email</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" name="email" id="email" type="text" value="<?php echo $email; ?>"
                             placeholder="Email">
                  </div>
              </div>
             
         </div>
   
		 </div>   
<div id="pad50" class="tab2">      
         <div class="row">
          <div class="form-group row">
                  <label for="example-email-input" class="col-xs-6 col-md-4 col-form-label">Accreditation Photo</label>
<!--                  <div class="col-xs-6 col-md-2"><img src="uploads/<?php echo $profile_pic; ?>" style="height:189px;width: 189px;"></div>-->
                  <div class="col-xs-6 col-md-2"><span id="viewimage2"><img src="uploads/<?php echo $profile_pic; ?>" style="height:189px;width: 189px;"></span></div>
                  <div class="col-xs-6 col-md-3">
<!--                      <input class="form-control" type="file" name="profile_pic" onchange="validate_fileupload(this.value);"  id="fileupload">
                      <input type="hidden" name="hidden_image" value="<?php echo $profile_pic; ?>">-->
                      
                      <input type="hidden" id="hidden_image" name="hidden_image" value="<?php echo $profile_pic; ?>">
<!--                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Upload Image</button>-->
                      <button type="button" class="btn_round" name="btnguest" id="imageupload" data-toggle="modal" data-target="#myModal" style="width: 55px;height: 55px;"><i class="fa fa-camera-retro" aria-hidden="true" style="font-size:24px"></i></button>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-email-input" class="col-xs-6 col-md-4 col-form-label">Short Artists Bio (Max 50 words)</label>
                 <div class="col-xs-6 col-md-5">
                     <textarea class="form-control"  name="artist_bio" id="artist_bio" placeholder="Your Bio" maxlength="200" ><?php echo $artists_bio; ?></textarea>
                  </div>
                 
              </div>   
         </div>
   
</div> 
<div id="pad50" class="tab3">
    <div class="row">
         <div class="form-group row">
                  <label for="example-url-input" class="col-xs-6 col-md-5 col-form-label">Your Soundcloud or Mixcloud link</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" type="url" name="soundcloud" id="soundcloud" value="<?php echo $soundcloud; ?>" placeholder="http://soundcloud.com" >
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-6 col-md-5 col-form-label">Your Instagram address</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" type="url" name="instagram" value="<?php echo $instagram; ?>" placeholder="http://Instragram.com/yourid" id="instagram">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-6 col-md-5 col-form-label">Your Artist Facebook Page</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" type="url" name="dj_fb_page" value="<?php echo $dj_fb_page;?>" placeholder="http://facebook.com/yourid" id="dj_fb_page">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-tel-input" class="col-xs-6 col-md-5 col-form-label">Your Personal Facebook Page</label>
                  <div class="col-xs-6 col-md-5">
                      <input class="form-control" type="url" name="fb_page" placeholder="http://facebook.com/yourid" value="<?php echo $fb_page; ?>" id="fb_page">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-password-input" class="col-xs-6 col-md-5 col-form-label">Have you been on a prior trip with us, if so which trip?</label>
                  <div class="col-xs-6 col-md-5">
                      
                      <input class="form-control" type="text" name="prior_trip" id="prior_trip" value="<?php echo $prior_trip; ?>">
                  </div>

              </div>
    </div>
</div>
<div id="pad50" class="tab4">
    <div class="row set_align" >
     
              <div class="form-group row">
                  <label for="example-date-input" class="col-xs-6 col-md-4 col-form-label">Is there a particular trip or location you'd like to perform at? </label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control" name="priorities" id="priorities" ><?php echo $priorities; ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-date-input"  class="col-xs-6 col-md-4 col-form-label">Do you have any criminal convictions that could restrict you travelling internationally?</label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control" style="height: 65px;" name="criminal_convictions" id="criminal_convictions"><?php echo $criminal_convictions; ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-time-input" class="col-xs-6 col-md-4 col-form-label">Do you regularly perform at paid or well known gigs or bars? If so please provide us more information around this.</label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control"  name="perform_in_nz" id="perform_in_nz"><?php echo $perform_in_nz; ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="example-password-input" class="col-xs-6 col-md-4 col-form-label">Are you a promoter, technician or involved in any
other way with the music scene?</label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control"  name="promoter" id="promoter"><?php echo $promoter; ?></textarea>
                  </div>

              </div> 
        <div class="form-group row">
                  <label for="example-password-input" class="col-xs-6 col-md-4 col-form-label">How would you describe your style or genre of music you play?</label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control"  name="specialize" id="specialize"><?php echo $specialize; ?></textarea>
                  </div>

              </div> 
        <div class="form-group row">
            <label for="example-password-input"  class="col-xs-6 col-md-4 col-form-label">Keeping your brand in mind, do you have the tracks and are you happy to play mainstream top40 if that is what the crowds wants?</label>
                  <div class="col-xs-6 col-md-5">
                      <textarea class="form-control" style="height: 86px;" name="track" id="track"><?php echo $track; ?></textarea>
                  </div>

              </div> 
        <div class="alert alert-info text-center">
            <label class="checkbox-inline text-center"><strong><input type="checkbox" id="chk_confirm" class="col-md-6 text-center" style="display:block"></strong>Please confirm you understand this is a non-paid role. <br>
                     Tourism HQ will cover your flights, accomodation, transfers and a meal plan for the duration of the event</label>
</div>
    </div>
</div>

<!---button line-->	
<div id="bottom_btn">
    <button type="button" class="btn_round step2" name="btnguest" id="btn_back" style="width: 55px;height: 55px;"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
<button type="button" class="btn_round back0" name="btnback" id="btn_forward" style="width: 55px;height: 55px;"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
</div>	
<!---button line-->	 		 
		 </div>           
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
    <script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery.imgareaselect.js"></script>
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
<script type="text/javascript" >
    $(document).ready(function() {
        $('.tab2').hide();
        $('.tab3').hide();
        $('.tab4').hide();
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="images/loading.gif" />');
            $(".uploadform").ajaxForm({
            	url: 'upload.php',
                success:  showResponse 
            }).submit();
        });
    });
    
    function showResponse(responseText, statusText, xhr, $form){
            
           setTimeout(function(){
           if(responseText.indexOf('.')>0){
			$('#thumbviewimage').html('<img src="<?php echo $upload_path; ?>'+responseText+'"   style="position: relative;" alt="Thumbnail Preview" />');
	    	$('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');
                
	    	$('#filename').val(responseText); 
			$('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
		}else{
			$('#thumbviewimage').html(responseText);
	    	$('#viewimage').html(responseText);
		}    
           },3000); 
	    
    }
    
</script>

<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 

	$('#thumbviewimage > img').css({
		width: Math.round(scaleX * img.width) + 'px', 
		height: Math.round(scaleY * img.height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
        
        
	
	var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
	var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
	var x2 = Math.round(x1+selection.width);
	var y2 = Math.round(y1+selection.height);
	
	$('#x1').val(x1);
	$('#y1').val(y1);
	$('#x2').val(x2);
	$('#y2').val(y2);	
	
	$('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
	$('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
	
} 

$(document).ready(function () { 
    $('#save_thumb').text('');
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
                var filename = $('#filename').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please Make a Selection First");
			return false;
		}else{
                    $.ajax({
                type:'POST',
                data:{x1: x1,x2:x2,y1:y1,y2:y2,w:w,h:h,upload_thumbnail:1,filename:filename},
                url:'imageupload.php',
                success:function(data) {
                   
                   
                    //location.reload();
                    $('#hidden_image').val(data);
                    $('#viewimage2').html('<img src="<?php echo $upload_path; ?>'+data+'"/>');
                    $('#myModal').modal('hide');
                   
                    }
              });
            return true;
		}
	});
        $('#imagefile').change(function(){
        var filesize = this.files[0].size;
        if(filesize > 1800000)
        {
            alert('Max File Size 2MB');
        } else {
        $('#submitbtn').click();
   }
        }); 
        });
$(document).on('click','.step2',function(){
var fname = $('#fname').val();
var res = fname.replace(/\s+/, "");
if(res == '')
{
    alert('Please input your name');
    } else {
        $("div#divLoading").addClass('show');
        var dj_name = $('#dj_name').val();
         var fname = $('#fname').val();
          var lname = $('#lname').val();
           var phone = $('#phone').val();
            var email = $('#email').val();
        $.ajax({
                type:'POST',
                data:{dj_name: dj_name,fname:fname,lname:lname,phone:phone,email:email,step:'1'},
                url:'dashboarddb.php',
                success:function(data) {
                    $('.menu1').removeAttr('id');
                    $('.menu2').attr('id','active_toppagination');
                    $('.tab1').hide();
                    $('.tab2').show();
                    $("div#divLoading").removeClass('show');
                    
                }
  });
  $(this).removeClass('step2');
   $(this).addClass('step3');
   $('#btn_forward').removeClass('back0');
   $('#btn_forward').addClass('back1');
    }
});
$(document).on('click','.step3',function(){

         var hidden_image = $('#hidden_image').val();
          var artist_bio = $('#artist_bio').val();
          
        $.ajax({
                type:'POST',
                data:{hidden_image: hidden_image,artist_bio:artist_bio,step:'2'},
                url:'dashboarddb.php',
                success:function(data) {
                    $('.menu2').removeAttr('id');
                    $('.menu3').attr('id','active_toppagination');
                    $('.tab2').hide();
                    $('.tab3').show();
                    
                }
  });
  $(this).removeClass('step3');
  $(this).addClass('step4');
  $('#btn_forward').removeClass('back1');
   $('#btn_forward').addClass('back2');
});

$(document).on('click','.step4',function(){
var soundcloud = $('#soundcloud').val();
var instagram = $('#instagram').val();
var fb_page = $('#fb_page').val();
var dj_fb_page = $('#dj_fb_page').val();
var prior_trip = $('#prior_trip').val();
$.ajax({
                type:'POST',
                data:{soundcloud: soundcloud,instagram:instagram,fb_page:fb_page,dj_fb_page:dj_fb_page,prior_trip:prior_trip,step:'3'},
                url:'dashboarddb.php',
                success:function(data) {
                    $('.menu3').removeAttr('id');
$('.menu4').attr('id','active_toppagination');
$('.tab3').hide();
$('.tab4').show();
                    
                }
  });
  
$(this).removeClass('step4');
$(this).addClass('finsih');
$('#btn_forward').removeClass('back2');
   $('#btn_forward').addClass('back3');
});

$(document).on('click','.finsih',function(){
var priorities = $('#priorities').val();
var criminal_convictions = $('#criminal_convictions').val();
var perform_in_nz = $('#perform_in_nz').val();
var promoter = $('#promoter').val();
var specialize = $('#specialize').val();
var track = $('#track').val();
if ($('#chk_confirm').is(':checked')) {
    $.ajax({
                type:'POST',
                data:{priorities: priorities,criminal_convictions:criminal_convictions,perform_in_nz:perform_in_nz,promoter:promoter,specialize:specialize,track:track,step:'4'},
                url:'dashboarddb.php',
                success:function(data) {
                    var obj = jQuery.parseJSON(data);
                   location.href='confirmation.php?id='+obj.fb_id;
                }
  });
    } else {
        alert("Please confirm terms and condition");
    }

 //$('#frm_edit').submit();   
});
$(document).on('click','.back1',function(){
    $('#btn_back').removeClass('step3');
   $('#btn_back').addClass('step2');
   $('#btn_forward').removeClass('back1');
   $('#btn_forward').addClass('back0');
                    $('.menu2').removeAttr('id');
                    $('.menu1').attr('id','active_toppagination');
                    $('.tab2').hide();
                    $('.tab1').show();
});
$(document).on('click','.back2',function(){
    $('#btn_back').removeClass('step4');
   $('#btn_back').addClass('step3');
   $('#btn_forward').removeClass('back2');
   $('#btn_forward').addClass('back1');
                    $('.menu3').removeAttr('id');
                    $('.menu2').attr('id','active_toppagination');
                    $('.tab3').hide();
                    $('.tab2').show();
});

$(document).on('click','.back3',function(){
    $('#btn_back').removeClass('finsih');
   $('#btn_back').addClass('step4');
   $('#btn_forward').removeClass('back3');
   $('#btn_forward').addClass('back2');
                    $('.menu4').removeAttr('id');
                    $('.menu3').attr('id','active_toppagination');
                    $('.tab4').hide();
                    $('.tab3').show();
});


</script>
  </body>
</html>
