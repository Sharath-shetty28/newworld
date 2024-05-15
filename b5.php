<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>
    <h2>Feedback Form</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="text" name="email" required><br><br>
        Subject: <input type="text" name="sub" required><br><br>
        Message: <textarea name="message" rows="4"  required></textarea><br><br>
        <input type="submit" name="submit_feedback" value="Submit Feedback">
    </form>

    <h2>Display Feedback</h2>
    <form method="post" action="">
        <input type="submit" name="display_feedback" value="Display Feedback">
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lab5";
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submit_feedback'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sub = $_POST['sub'];
            $message = $_POST['message'];
            $sql = "INSERT INTO feed (name, email, sub, message) VALUES ('$name', '$email', '$sub', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo "Thank you for your feedback";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } elseif (isset($_POST['display_feedback'])) {
            $sql = "SELECT * FROM feed";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Name: " . $row["name"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    echo "Subject: " . $row["sub"] . "<br>";
                    echo "Message: " . $row["message"] . "<br><br>";
                }
            } else {
                echo "No feedback records found";
            }
        }
    }
    $conn->close();
    ?>
</body>
</html>
