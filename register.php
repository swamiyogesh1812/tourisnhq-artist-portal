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
        <form class="form-signin" method="POST" action="register_process.php">
            <h2 class="form-signin-heading">Register</h2>
            <input type="text" class="form-control" placeholder="Full Name" name="fullname" required autofocus>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
