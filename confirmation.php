<!DOCTYPE html>
<?php
session_start();
include('dbconfig.php');
$fb_id = '122106473678194399';
//$_SESSION['FBID'] = $fb_id;
$query = mysqli_query($conn, "SELECT * FROM artists WHERE fb_id = '$fb_id' AND directory = '1'");
$num = mysqli_num_rows($query);

           if($num > 0) 
           {
            $row = mysqli_fetch_array($query);
            $fb_id = '122106473678194399';
            $dj_name = $row['dj_name'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $profile_pic = $row['profile_pic'];
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
            $location_id = '11';
            $query_locations = mysqli_query($conn, "SELECT * FROM locations WHERE id = '$location_id'");
            $row_locations = mysqli_fetch_array($query_locations);
            $location_name = $row_locations['name'];
           }
        
           ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>TourismHQ - Artist Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap1.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="bootstrap/css/custom.css" />
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
	<script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #header {
    color: #00BCCF;
    font-size: 26px;
    margin-bottom: 30px;
    font-family: oswald;
    text-transform: uppercase;
}
.dark{
    font: bold;
}
@media screen and (max-width: 623px) {
    .lineheight {
        line-height: 27px;
        padding-bottom: 2px;
    }
    #lg-header-wlink span {
    background: #00bccf;
    color: #fff;
    font-family: oswald;
    text-transform: uppercase;
    padding: 20px;
    font-size: 14px;
    margin: 0px;
    position: relative;
    top: -10px;
}
    </style>
  </head>

  <body style="background:url(images/bg.jpg) no-repeat;background-position: center;background-size: 100% 100%; background-attachment: fixed;">


<div class="container" id="showpay4" >  
    <div class="row centered">
        <div id="lg-whitebg" class="col-xs-12 col-md-12" >
            <div>
                <!--header-->	      
                <p id="lg-header-wlink" ><span class="col-xs-6 col-md-10"><a style="margin-left: 17%;color: white;">Thank you!</a></span><span class="col-xs-6 col-md-2" id="small-link"><a href="index.php">Sign-out</a></span></p>
                <!--header-->		
                <div class="col-md-2">  </div>	
                <div class="col-xs-12 col-md-8">  <!---col8 s--->     
                    <div id="subheadbig" class="row" style="text-align:center">
                        Below is the information we have on file,we'll be in touch!
                        <hr>
                    </div>   

<!--                    <div id="black18" >Your Reservation #1111</div>              
                    <p class="text-left" class="row">
                        Congrats on securing your spot for SpringBreak RARO!<br>
                        Please make sure you secure travel insurance if you haven't already.<br> 
                        We'll be in touch with all the details and how to make the most of the trip as we build up to the experience.<br>
                        Tickets will be issued two weeks prior to departure.<br>
                        <br><b>Until then please make sure all your details are 100% correct below - then kick back, relax!</b>
                    </p>  -->

                   
                        <div class="panel panel-default" id="panelnoborder">
                            <div class="panel-heading" role="tab" id="detailhead">
                                <h4 class="panel-title1">	 
                                    <a id="black18" class="" data-toggle="collapse" data-parent="#accordion" href="#detail" aria-expanded="true" aria-controls="detail">
                                        <!-- panel title s-->	
                                        Your Details
                                        <!-- panel title e-->	
                                    </a>
                                    <a href="dashboard.php?edit=1" class="pull-right">Edit</a>
                                </h4>
                            </div>
                            <div id="detail" class="panel-collapse" role="tabpanel" aria-labelledby="detailhead" aria-expanded="true" style="height: 0px;">
                                <div class="panel-body1">	
                                    <div id="detail1" class="text-left">
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Flying From</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $location_name ; ?></div>

                                            </div>
                                        </div>
                                        <!-- panel content s-->
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>DJ / Stage Name</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $dj_name ; ?></div>

                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>First Name </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $fname ; ?></div>

                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Last Name </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $lname ; ?></div>

                                            </div>
                                        </div>
                                         <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Telephone </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $phone; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Email </b></div>
                                                <div class="col-xs-6 col-md-7 text-left" style="word-wrap: break-word;"><?php echo $email; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Profile Image </b></div>
                                                <div class="col-xs-6 col-md-7 text-left">
                                                    <?php
                                                    if($profile_pic == 'me_black.png')
                                                    {
                                                        $display_img = $profile_pic;
                                                    } else {
                                                      $display_img = substr($profile_pic,6);  
                                                    }
                                                    ?>
                                                    <a id="single_1" href="uploads/<?php echo $display_img; ?>" title="Profile Image"><img src="uploads/<?php echo $profile_pic; ?>" style="height:20%;width: 20%;"></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Short Artists Bio </b></div>
                                                <div class="col-xs-6 col-md-6 text-left"><?php echo $artists_bio; ?></div>

                                            </div>
                                        </div>
                                       
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Your Soundcloud or Mixcloud link </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $soundcloud; ?></div>
                                            </div>
                                        </div>
                                         <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Your Instagram address </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $instagram; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Your Artist Facebook Page </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $dj_fb_page; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12 lineheight">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Your Personal Facebook Page </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $fb_page; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Have you been on a prior trip with us, if so which trip? </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $prior_trip; ?> </div>
                                            </div>
                                        </div>
                                         <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Is there a particular trip or location you'd like to perform at?</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $priorities ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Do you have any criminal convictions that could interfere with you traveling outside of New Zealand?</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $criminal_convictions; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Do you regularly perform in NZ, if so at which venues and/or radio stations?</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $perform_in_nz ?></div>
                                            </div>
                                        </div>
                                         <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Are you a promoter, technician or involved in any
other way with the music scene? </b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $promoter; ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>What style of music do you specialise in?</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $specialize ?></div>
                                            </div>
                                        </div>
                                        <div  class="zrow">
                                            <div  class="greybg col-xs-12 col-md-12" style="line-height: 27px;padding-bottom: 2px;">
                                                <div class="col-xs-6 col-md-5 text-right"><b>Keeping your brand in mind, do you have the tracks and are you happy to play mainstream top40 if that is what the crowds wants?</b></div>
                                                <div class="col-xs-6 col-md-7 text-left"><?php echo $track ?></div>
                                            </div>
                                        </div>



                                        <!-- panel content e-->	
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                    <!---panel2 e--->

                    <!---panel3 s--->

                </div>	          
            </div>
        </div>
    </div>
</div>
      <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
      <script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
      <script>
      $(document).ready(function() {
    $("#single_1").fancybox({
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
      </body>
      
</html>







