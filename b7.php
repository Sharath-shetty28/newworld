<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lab7";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function calculateDiscount($code, $price, $quantity)
{
    switch ($code) {
        case '101':
            return $price * $quantity * 0.15;
        case '102':
            return $price * $quantity * 0.2;
        case '103':
            return $price * $quantity * 0.25;
        default:
            return $price * $quantity * 0.05;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_order'])) {
    $bnumber = $_POST['bnumber'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $code = $_POST['code'];

    $total = $price * $quantity;
    $discount = calculateDiscount($code, $price, $quantity);
    $net = $total - $discount;

    $sql = "INSERT INTO book (bnumber, title, price, quantity, code, total, discount, net) VALUES ('$bnumber', '$title', '$price', '$quantity', '$code', '$total', '$discount', '$net')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully.<br>";
        echo "Total: $total.<br>";
        echo "Discount: $discount.<br>";
        echo "Net total: $net.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping</title>
</head>

<body>
    <h2>Book Shopping Form</h2>
    <form method="post">
        Book Number:<input type="text" name="bnumber" required />
        Book Title:<input type="text" name="title" required />
        Price:<input type="number" name="price" required />
        Quantity:<input type="number" name="quantity" required />

        Book Code:
        <select name="code" required>
            <option value="101">101</option>
            <option value="102">102</option>
            <option value="103">103</option>
            <option value="default">Others</option>
        </select><br />

        <input type="submit" name="submit_order" value="Place Order" />
    </form>
</body>
</html>

<?php
$conn->close();
?>
