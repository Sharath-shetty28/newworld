<html lang="en">
    <title>Armstrong Number Checker</title>
<body>
<h2>Armstrong Number Checker</h2>

<form method="post">
    Enter a number: <input type="text" name="number">
    <input type="submit" value="Check">
</form>

<?php
function isArmstrong($num) {
    $sum = 0;
    $temp = $num;
    $digits = strlen($num);

    while ($temp > 0) {
        $digit = $temp % 10;
        $sum += pow($digit, $digits);
        $temp = (int)($temp / 10);
    }

    return $num == $sum;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];

    if (is_numeric($number) && $number > 0) {
        if (isArmstrong($number)) {
            echo "<h3>$number is an Armstrong number!</h3>";
            echo "<p>Armstrong numbers from 1 to $number:</p>";
            for ($i = 1; $i < $number; $i++) {
                if (isArmstrong($i)) {
                    echo "$i ";
                }
            }
        } else {
            echo "<h3>$number is not an Armstrong number.</h3>";
        }
    } else {
        echo "<p>Please enter a valid positive integer.</p>";
    }
}
?>

</body>
</html>
