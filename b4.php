<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>

    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lab4";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to validate user credentials
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>Login successful!  Welcome, $username</p>";
        } else {
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
