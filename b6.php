<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lab6";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (isset($_POST['add_customer'])) {
    $cnumber = $_POST['cnumber'];
    $cname = $_POST['cname'];
    $item = $_POST['item'];
    $mobile = $_POST['mobile'];

    if (strlen($mobile) != 10 || !is_numeric($mobile)) {
        echo "Error: Mobile number should be numeric and have 10 digits";
    } else {
        $sql = "INSERT INTO customer (cnumber, cname, item, mobile) VALUES ('$cnumber', '$cname', '$item', '$mobile')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_POST['delete_customer'])) {
    $cnumber = $_POST['delete_cnumber'];
    $sql = "DELETE FROM customer WHERE cnumber = '$cnumber'";
    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            echo "Record deleted successfully";
        } else {
            echo "No record found with the provided customer number";
        }
    }
}

if (isset($_POST['search'])) {
    $cnumber = $_POST['search_cnumber'];
    $sql = "SELECT * FROM customer WHERE cnumber = '$cnumber'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Customer Number: " . $row['cnumber'] . " - Customer Name: " . $row['cname'] . " - Item: " . $row['item'] . " - Mobile Number: " . $row['mobile'] . "<br>";
        }
    } else {
        echo "No records found";
    }
}

if (isset($_POST['sort'])) {
    $sql = "SELECT * FROM customer ORDER BY cnumber";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Customer Number: " . $row['cnumber'] . " - Customer Name: " . $row['cname'] . " - Item: " . $row['item'] . " - Mobile Number: " . $row['mobile'] . "<br>";
        }
    } else {
        echo "No results";
    }
}

if (isset($_POST['display_all'])) {
    $sql = "SELECT * FROM customer";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Customer Number: " . $row['cnumber'] . " - Customer Name: " . $row['cname'] . " - Item: " . $row['item'] . " - Mobile Number: " . $row['mobile'] . "<br>";
        }
    } else {
        echo "No results";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Customer Information</title>
</head>

<body>
    <h1>Customer Information</h1>
    <button onclick="toggleForm('addForm')">Add Customer Info</button>
    <button onclick="toggleForm('deleteForm')">Delete Info</button>
    <button onclick="toggleForm('searchForm')">Search Info</button>
    <button onclick="toggleForm('sortForm')">Sort Info</button>
    <button onclick="toggleForm('displayForm')">Display Info</button>

    <div id="addForm" style="display:none">
        <h3>Add customer information</h3>
        <form method="post" action="">
            Customer Number:<input type="text" name="cnumber" required="required" /><br />
            Customer Name:<input type="text" name="cname" required="required" /><br />
            Item Purchased:<input type="text" name="item" required="required" /><br />
            Mobile Number:<input type="number" name="mobile" required="required" /><br />
            <input type="submit" name="add_customer" value="Add Customer" />
        </form>
    </div>

    <div id="deleteForm" style="display:none;">
        <h3>Delete Customer Records</h3>
        <form method="post" action="">
            Customer Number:<input type="text" name="delete_cnumber" required="required" /><br />
            <input type="submit" name="delete_customer" value="Delete Customer" />
        </form>
    </div>

    <div id="searchForm" style="display:none;">
        <h3>Search Database</h3>
        <form method="post" action="">
            Customer Number:<input type="text" name="search_cnumber" required="required" /><br />
            <input type="submit" name="search" value="Search" />
        </form>
    </div>

    <div id="sortForm" style="display:none;">
        <h3>Sort Database</h3>
        <form method="post" action="">
            <input type="submit" name="sort" value="Sort" />
        </form>
    </div>

    <div id="displayForm" style="display:none;">
        <h3>Display Details</h3>
        <form method="post" action="">
            <input type="submit" name="display_all" value="Display" />
        </form>
    </div>

    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</body>
</html>
