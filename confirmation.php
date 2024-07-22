<!DOCTYPE html>
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
    <link href="bootstrap/css/bootstrap1.min.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap/css/custom.css" />
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
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
        .dark {
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
        }
    </style>
</head>
<body style="background:url(images/bg.jpg) no-repeat;background-position: center;background-size: 100% 100%; background-attachment: fixed;">
<?php
session_start();
include('dbconfig.php');

// Assuming the fb_id is stored in the session
if (isset($_SESSION['UID'])) {
    $fb_id = $_SESSION['UID'];
} else {
    // Handle the case where the fb_id is not set in the session
    // For example, redirect to login page or set a default fb_id
    header('Location: login.php');
    exit();
}

$query = mysqli_query($conn, "SELECT * FROM artists WHERE fb_id = '$fb_id' AND directory = '1'");
$num = mysqli_num_rows($query);

if ($num > 0) {
    $row = mysqli_fetch_array($query);
    $dj_name = $row['dj_name'] ?? '';
    $fname = $row['fname'] ?? '';
    $lname = $row['lname'] ?? '';
    $profile_pic = $row['profile_pic'] ?? '';
    $soundcloud = $row['soundcloud'] ?? '';
    $instagram = $row['instagram'] ?? '';
    $prior_trip = $row['prior_trip'] ?? '';
    $largest_gig = $row['largest_gig'] ?? '';
    $priorities = $row['priorities'] ?? '';
    $artists_bio = $row['artists_bio'] ?? '';
    $dj_fb_page = $row['dj_fb_page'] ?? '';
    $perform_in_nz = $row['perform_in_nz'] ?? '';
    $promoter = $row['is_promoter'] ?? '';
    $fb_page = $row['fb_page'] ?? '';
    $phone = $row['phone'] ?? '';
    $email = $row['email'] ?? '';
    $criminal_convictions = $row['criminal_convictions'] ?? '';
    $specialize = $row['specialize'] ?? '';
    $track = $row['track'] ?? '';
    $location_id = '11'; // This should also be dynamic if necessary

    $query_locations = mysqli_query($conn, "SELECT * FROM locations WHERE id = '$location_id'");
    if (mysqli_num_rows($query_locations) > 0) {
        $row_locations = mysqli_fetch_array($query_locations);
        $location_name = $row_locations['name'];
    } else {
        $location_name = 'Unknown'; // Default value if location is not found
    }
} else {
    // Handle the case where no artist is found
    $location_name = 'Unknown';
    $dj_name = $fname = $lname = $profile_pic = $soundcloud = $instagram = $prior_trip = $largest_gig = $priorities = $artists_bio = $dj_fb_page = $perform_in_nz = $promoter = $fb_page = $phone = $email = $criminal_convictions = $specialize = $track = 'Not available';
}
?>
<div class="container" id="showpay4">  
    <div class="row centered">
        <div id="lg-whitebg" class="col-xs-12 col-md-12">
            <div>
                <!--header-->	      
                <p id="lg-header-wlink"><span class="col-xs-6 col-md-10"><a style="margin-left: 17%;color: white;">Thank you!</a></span><span class="col-xs-6 col-md-2" id="small-link"><a href="index.php">Sign-out</a></span></p>
                <!--header-->		
                <div class="col-md-2"></div>	
                <div class="col-xs-12 col-md-8">  <!---col8 s--->     
                    <div id="subheadbig" class="row" style="text-align:center">
                        Below is the information we have on file,we'll be in touch!
                        <hr>
                    </div>
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
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $location_name; ?></div>
                                        </div>
                                    </div>
                                    <!-- panel content s-->
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>DJ / Stage Name</b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $dj_name; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>First Name </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $fname; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Last Name </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $lname; ?></div>
                                        </div>
                                    </div>
                                     <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Telephone </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $phone; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Email </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $email; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Specializations </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $specialize; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Artists Track </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $track; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Profile Picture </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><img src="<?php echo $profile_pic; ?>" width="200" height="200" /></div>
                                        </div>
                                    </div>
                                    <!-- panel content e-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" id="panelnoborder">
                        <div class="panel-heading" role="tab" id="profilehead">
                            <h4 class="panel-title1">	 
                                <a id="black18" class="" data-toggle="collapse" data-parent="#accordion" href="#profile" aria-expanded="true" aria-controls="profile">
                                    <!-- panel title s-->	
                                    Your Profile
                                    <!-- panel title e-->	
                                </a>
                                <a href="dashboard.php?edit=1" class="pull-right">Edit</a>
                            </h4>
                        </div>
                        <div id="profile" class="panel-collapse" role="tabpanel" aria-labelledby="profilehead" aria-expanded="true" style="height: 0px;">
                            <div class="panel-body1">	
                                <div id="profile1" class="text-left">
                                    <!-- panel content s-->
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>SoundCloud URL </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><a href="<?php echo $soundcloud; ?>" target="_blank"><?php echo $soundcloud; ?></a></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Instagram URL </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><a href="<?php echo $instagram; ?>" target="_blank"><?php echo $instagram; ?></a></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>DJ Facebook Page </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><a href="<?php echo $dj_fb_page; ?>" target="_blank"><?php echo $dj_fb_page; ?></a></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Have You Been To New Zealand Before? </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $prior_trip; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>What's The Largest Gig You've Performed? </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $largest_gig; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>What are your priorities?</b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $priorities; ?></div>
                                        </div>
                                    </div>
                                    <div  class="zrow">
                                        <div  class="greybg col-xs-12 col-md-12">
                                            <div class="col-xs-6 col-md-5 text-right"><b>Your Bio </b></div>
                                            <div class="col-xs-6 col-md-7 text-left"><?php echo $artists_bio; ?></div>
                                        </div>
                                    </div>
                                    <!-- panel content e-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---col8 e--->
                </div>
                <div class="col-md-2"></div>			
            </div>
        </div>
    </div>
</div>
</body>
</html>
