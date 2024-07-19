<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register - TourismHQ</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    
<form method="post" class="form-signin" action="register_process.php">
        <h2 class="form-signin-heading">Register</h2>
    <label for="fullname">Full Name:</label>
    <input type="text" class="form-control" name="fullname" id="fullname" required>
    
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email" required>
    
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="password" required>
    
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
    
    <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
</form>
    </div>
</body>
</html>
