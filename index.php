<?php
session_start();
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
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
        <link href="bootstrap/css/signin.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap/css/custom.css" />
        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
                <meta name="robots" content="noindex">
    </head>
    <body style="background:url(images/bg.jpg) no-repeat;background-position: center;background-size: 100% 100%; background-attachment: fixed;">
        <div id="fb-root"></div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v19.0&appId=351759512421300" nonce="3uPmaEGT"></script>        -->

        <script>
            function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
                console.log('statusChangeCallback');
                console.log(response);                   // The current login status of the person.
                if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                testAPI(response.authResponse.accessToken);
                } else {                                 // Not logged into your webpage or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this webpage.';
                }
            }


            function checkLoginState() {               // Called when a person is finished with the Login Button.
                FB.getLoginStatus(function(response) {   // See the onlogin handler
                statusChangeCallback(response);
                });
            }


            window.fbAsyncInit = function() {
                FB.init({
                appId      : '351759512421300',
                cookie     : true,                     // Enable cookies to allow the server to access the session.
                xfbml      : true,                     // Parse social plugins on this webpage.
                version    : 'v19.0'           // Use this Graph API version for this call.
                });

                // FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
                // statusChangeCallback(response);        // Returns the login status.
                // });
            };

            function testAPI(token) {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                console.log('Welcome!  Fetching your information.... ');
                FB.api(`/me?fields=id%2Cname%2Cemail&access_token=${token}`, function(response) {
                    console.log(response)
                    if(response.name){
                        $.ajax({
                            url: "functions.php",
                            method: 'post',
                            data: {name:response.name,email:response.email,fuid:response.id}
                            })
                            .done(function( data ) {
                                result = JSON.parse(data)
                                if(result['status']) location = 'dashboard.php'
                                console.log( data);

                        });
                        console.log('Successful login for: ' + response.name);
                        document.getElementById('status').innerHTML =
                            'Thanks for logging in, ' + response.name + '!';
                    }
                });
            }
        </script>

        <!-- Before login -->
        <!-- <div class="container">

            <div class="row centered">
                <div id="whitebg" class="col-xs-10 col-md-6" >
                    <form class="form-signin">
                        <div class="row">
                       <div class="col-md-12">
                           <h4>TourismHQ - Artist Portal</h4>
                           <div class="fb-login-button" data-width="500px" data-size="" data-onlogout="location.reload();" data-onlogin="checkLoginState();" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false">Sign In with Facebook</div>
                           <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                            Sign In with Facebook
                            </fb:login-button> -->

                            <div id="status">
                            </div>
                           <!-- <div class="fb-login-button" data-width="167" data-size="" data-button-type="" data-layout="" data-auto-logout-link="false" data-use-continue-as="false"></div> -->


                           <!-- <a class="btn" style="background-color: #00A8B9;color:white" href="fbconfig.php">
                                Sign in with Facebook
                            </a> -->

                       </div>
<!--                    <div class="col-md-6">
                            <a class="btn" style="background-color: #00A8B9;color:white" href="admin.php">
                               Admin Section
                            </a>

                       </div>-->
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="container">
            <div class="row centered">
                <div id="whitebg" class="col-xs-10 col-md-6">
                    <form method="post" class="form-signin" action="login_process.php">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                    </form>

                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</html>
