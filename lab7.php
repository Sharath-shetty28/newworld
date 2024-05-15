<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulation</title>
</head>
<body>

<h2>String Manipulation</h2>

<form method="post">
    <label for="inputString">Enter a string:</label><br>
    <input type="text" id="inputString" name="inputString" required><br><br>

    <input type="submit" name="getLength" value="Get Length">
    <input type="submit" name="reverse" value="Reverse">
    <input type="submit" name="uppercase" value="Uppercase">
    <input type="submit" name="lowercase" value="Lowercase">
    <input type="submit" name="replace" value="Replace">
    <input type="submit" name="checkPalindrome" value="Check Palindrome">
    <input type="submit" name="shuffle" value="Shuffle">
    <input type="submit" name="wordCount" value="Word Count">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST["inputString"];

    if (isset($_POST["getLength"])) {
        echo "<p>Length of the string: " . strlen($inputString) . "</p>";
    }

    if (isset($_POST["reverse"])) {
        echo "<p>Reversed string: " . strrev($inputString) . "</p>";
    }

    if (isset($_POST["uppercase"])) {
        echo "<p>Uppercase string: " . strtoupper($inputString) . "</p>";
    }

    if (isset($_POST["lowercase"])) {
        echo "<p>Lowercase string: " . strtolower($inputString) . "</p>";
    }

    if (isset($_POST["replace"])) {
        echo "Replaced string: " . str_replace('a', 'x', strtolower($inputString) );
    }

    if (isset($_POST["checkPalindrome"])) {
      
        if (strrev($inputString )== $inputString) {
            echo  "<p>The string is a palindrome.</p>";
        } else {
            echo "<p>The string is not a palindrome.</p>";
        }
    }

    if (isset($_POST["shuffle"])) {
        echo "<p>Shuffled string: " . str_shuffle($inputString) . "</p>";
    }

    if (isset($_POST["wordCount"])) {
        $wordCount = str_word_count($inputString);
        echo "<p>Word count: " . $wordCount . "</p>";
    }
}
?>

</body>
</html>
