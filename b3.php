<!DOCTYPE html>
<html>
<head>
    <title>Distance Calculator</title>
</head>
<body>
    <h2>Enter two distances in feet and inches</h2>
    <form action="" method="post">
        Distance 1:
        <input type="text" name="feet1" placeholder="Feet"> feet
        <input type="text" name="inches1" placeholder="Inches"> inches
        <br><br>
        Distance 2:
        <input type="text" name="feet2" placeholder="Feet"> feet
        <input type="text" name="inches2" placeholder="Inches"> inches
        <br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $feet1 = $_POST['feet1'];
        $inches1 = $_POST['inches1'];
        $feet2 = $_POST['feet2'];
        $inches2 = $_POST['inches2'];

        // Calculate total inches for each distance
        $totalInches1 = $feet1 * 12 + $inches1;
        $totalInches2 = $feet2 * 12 + $inches2;

        // Calculate sum and difference
        $sum = $totalInches1 + $totalInches2;
        $difference = abs($totalInches1 - $totalInches2);

        echo "<h2>Results</h2>";
        echo "Sum: " . floor($sum / 12) . " feet " . ($sum % 12) . " inches<br>";
        echo "Difference: " . floor($difference / 12) . " feet " . ($difference % 12) . " inches";
    }
    ?>
</body>
</html>
