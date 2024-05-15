<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Calculator</title>
</head>
<body>

<h2>PHP Calculator</h2>

<form method="post">
    <input type="text" name="num1" placeholder="Enter first number" required>
    <select name="operator" required>
        <option value="add">+</option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="text" name="num2" placeholder="Enter second number" required>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];
    
    // Validate inputs
    if (!is_numeric($num1) || !is_numeric($num2)) {
        echo "Please enter valid numbers.";
    } else {
        switch ($operator) {
            case "add":
                $result = $num1 + $num2;
                echo "<p>Result: $num1 + $num2 = $result</p>";
                break;
            case "subtract":
                $result = $num1 - $num2;
                echo "<p>Result: $num1 - $num2 = $result</p>";
                break;
            case "multiply":
                $result = $num1 * $num2;
                echo "<p>Result: $num1 * $num2 = $result</p>";
                break;
            case "divide":
                if ($num2 == 0) {
                    echo "Error: Division by zero is not allowed.";
                } else {
                    $result = $num1 / $num2;
                    echo "<p>Result: $num1 / $num2 = $result</p>";
                }
                break;
        }
    }
}
?>

</body>
</html>
