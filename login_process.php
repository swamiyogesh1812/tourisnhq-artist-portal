<?php
session_start();
require 'dbconfig.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Query to find the user by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE Femail = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the user data
            $user = $result->fetch_assoc();
            
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct
                $_SESSION['UID'] = $user['UID'];
                $_SESSION['FULLNAME'] = $user['Ffname'];
                $_SESSION['EMAIL'] = $user['Femail'];
                header('Location: dashboard.php');
                exit();
            } else {
                echo "Invalid email or password!";
            }
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Please fill in both fields.";
    }
} else {
    echo "Please fill in both fields.";
}
?>
