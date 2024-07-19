<?php
session_start();
require 'dbconfig.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (!empty($fullname) && !empty($email) && !empty($password) && ($password === $confirm_password)) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Generate a unique userid
        $userid = rand(100000, 999999);

        // Check if userid already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE userid = ?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $userid = rand(100000, 999999); // Regenerate if ID exists
        }

        // Generate a unique 18-digit integer Fuid
        do {
            $fuid = random_int(100000000000000000, 999999999999999999); // Generates an 18-digit integer
            $stmt = $conn->prepare("SELECT * FROM users WHERE Fuid = ?");
            $stmt->bind_param("i", $fuid);
            $stmt->execute();
            $result = $stmt->get_result();
        } while ($result->num_rows > 0);

        // Prepare and execute the insert query
        $stmt = $conn->prepare("INSERT INTO users (userid, Fuid, Ffname, Femail, password, profile_complete) VALUES (?, ?, ?, ?, ?, ?)");
        $profile_complete = '1'; // Assuming this is a flag
        $stmt->bind_param("iissss", $userid, $fuid, $fullname, $email, $password_hash, $profile_complete);
        if ($stmt->execute()) {
            $_SESSION['UID'] = $stmt->insert_id; // Get the auto-incremented UID
            $_SESSION['FULLNAME'] = $fullname;
            $_SESSION['EMAIL'] = $email;
            $_SESSION['FUID'] = $fuid; // Store Fuid in session

            // Redirect to dashboard.php with Fuid as a parameter
            header('Location: dashboard.php?Fuid=' . $fuid);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Validation failed. Make sure all fields are filled and passwords match.";
    }
} else {
    echo "Please fill in all fields.";
}
?>
