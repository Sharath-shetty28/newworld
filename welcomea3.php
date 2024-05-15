<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index3.php");
    exit;
}

// Welcome message
$username = $_SESSION['username'];

// Logout functionality
if (isset($_POST['logout'])) {
    $_SESSION = [];
    session_destroy();
    header("Location: index3.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>

    <h2>Welcome, <?php echo $username; ?>!</h2>
    <form method="post">
        <p>Welcome user!</p>
        <input type="submit" name="logout" value="Logout">
    </form>

</body>
</html>
