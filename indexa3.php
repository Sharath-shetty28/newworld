<?php
session_start();

// Check if the user is already logged in
if(isset($_SESSION['username'])) {
    header("Location: welcome3.php");
    exit;
}

$valid_username = "shetty";
$valid_password = "sharath";

// Check login credentials on form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: welcome3.php");
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

   <?php if(isset($error_message)) { 
        echo " <p> $error_message; </p>";
    }
 ?>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

</body>
</html>
