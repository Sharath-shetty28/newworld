<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Details</title>
</head>
<body>

<h2>Student Registration Details</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>First Name: <strong>" . $_POST["firstName"] . "</strong></p>";
    echo "<p>Last Name: " . $_POST["lastName"] . "</p>";
    echo "<p>Address: " . $_POST["address"] . "</p>";
    echo "<p>E-Mail: " . $_POST["email"] . "</p>";
    echo "<p>Mobile: " . $_POST["mobile"] . "</p>";
    echo "<p>City: " . $_POST["city"] . "</p>";
    echo "<p>State: " . $_POST["state"] . "</p>";
    echo "<p>Gender: " . $_POST["gender"] . "</p>";
    echo "<p>Hobbies: " . implode(", ", $_POST["hobbies"]) . "</p>";
    echo "<p>Blood Group: " . $_POST["bloodGroup"] . "</p>";
}
?>

</body>
</html>
