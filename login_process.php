<?php
session_start();

include('dbconfig.php');

// Get user credentials from POST request
$username = $_POST['username'];
$password = $_POST['password'];

// Check if email and password are provided
if (empty($username) || empty($password)) {
    echo "Email and password are required!";
    exit();
}

// Query to check user credentials
$sql = "SELECT UID, Ffname FROM users WHERE Femail = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // User found
    $stmt->bind_result($id, $name);
    $stmt->fetch();
    
    // Store user info in session
    $_SESSION['user_id'] = $id;
    $_SESSION['user_name'] = $name;
    
    // Redirect to dashboard
    header('Location: dashboard.php');
} else {
    echo "Invalid email or password!";
}

$stmt->close();
$conn->close();
?>
