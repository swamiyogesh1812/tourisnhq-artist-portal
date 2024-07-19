<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - TourismHQ</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>
<body>
    <div class="container">
<form method="post" class="form-signin" action="login_process.php">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email" required>
    
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password" id="password" required>
    
    <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</form>


    </div>
</body>
</html>
