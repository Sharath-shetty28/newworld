<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Submission</title>
</head>
<body>

<h2>Form Submission</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  echo "<p>Name: $name</p>";
  echo "<p>Email: $email</p>";
  echo "<p>Message: $message</p>";
} else {
  echo "<p>No form</p>";
}
?>

</body>
</html>
