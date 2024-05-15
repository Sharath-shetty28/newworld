<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="post" action="b1.php">
    <label for="firstName">First Name:</label><br>
    <input type="text"  name="firstName" required><br><br>

    <label for="lastName">Last Name:</label><br>
    <input type="text"  name="lastName" required><br><br>

    <label for="address">Address:</label><br>
    <textarea name="address" required></textarea><br><br>

    <label for="email">E-Mail:</label><br>
    <input type="email"  name="email" required><br><br>

    <label for="mobile">Mobile:</label><br>
    <input type="text"  name="mobile" pattern="[0-9]{10}"  required><br><br>

    <label for="city">City:</label><br>
    <input type="text"  name="city" required><br><br>

    <label for="state">State:</label><br>
    <input type="text"  name="state" required><br><br>

    <label for="gender">Gender:</label><br>
    <input type="radio" name="gender" value="Male" required>
    <label for="male">Male</label>
    <input type="radio"  name="gender" value="Female" required>
    <label for="female">Female</label><br><br>

    <label for="hobbies">Hobbies:</label><br>
    <input type="checkbox"  name="hobbies[]" value="Reading" >
    <label for="hobby1">Reading</label>
    <input type="checkbox"  name="hobbies[]" value="Gaming"  >
    <label for="hobby2">Gaming</label>
    <input type="checkbox" name="hobbies[]" value="Sports"  >
    <label for="hobby3">Sports</label><br><br>

    <label for="bloodGroup">Blood Group:</label><br>
    <select  name="bloodGroup" required>
        <option value="">Select ur blood</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
