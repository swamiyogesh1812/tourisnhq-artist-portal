<?php
session_start();
require 'dbconfig.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (!empty($fullname) && !empty($email) && !empty($username) && !empty($password) && ($password === $confirm_password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $userid = rand(100000, 999999); 
        $query = "SELECT * FROM users WHERE userid = $userid";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $userid = rand(100000, 999999);
        }

        // Insert user into the database
        $query = "INSERT INTO users (userid, Ffname, Femail, password, profile_complete) VALUES ('$userid', '$fullname', '$email', '$password_hash', '1')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['UID'] = mysqli_insert_id($conn); // Get the auto-incremented UID
            $_SESSION['FULLNAME'] = $fullname;
            $_SESSION['EMAIL'] = $email;
            header('Location: dashboard.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Validation failed. Make sure all fields are filled and passwords match.";
    }
} else {
    echo "Please fill in all fields.";
}
?>
