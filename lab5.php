<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age Calculator</title>
</head>
<body>

<h2>Age Calculator</h2>

<form method="post">
    <label for="birthdate">Enter your birth date:</label>
    <input type="date" name="birthdate" required>
    <input type="submit" value="Calculate Age">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $birthdate = new DateTime($_POST["birthdate"]);
    $today =new DateTime (date("y-m-d"));

    $diff = date_diff($today,$birthdate);
    $years = $diff->y;
    $months = $diff->m;
    $days = $diff->d;

    echo "<h3>Your age is $years years, $months months, and $days days.</h3>";
}
?>

</body>
</html>
