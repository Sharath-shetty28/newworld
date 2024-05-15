<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "lab8";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['checkin'])) {
    $room_number = $_POST['room_number'];
    $sql = "SELECT * FROM room WHERE RoomNo='$room_number' AND Status='available'";
    $result_check_room = $conn->query($sql);

    if ($result_check_room->num_rows > 0) {
        $sql = "UPDATE room SET Status='booked' WHERE RoomNo='$room_number'";
        if ($conn->query($sql) === TRUE) {
            echo "ROOM CHECKED IN SUCCESSFULLY";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Room not available";
    }
}

if (isset($_POST['checkout'])) {
    $room_number = $_POST['room_number'];
    $sql = "SELECT * FROM room WHERE RoomNo='$room_number' AND Status='booked'";
    $result_check_room = $conn->query($sql);

    if ($result_check_room->num_rows > 0) {
        $sql = "UPDATE room SET Status='available' WHERE RoomNo='$room_number'";
        if ($conn->query($sql) === TRUE) {
            echo "ROOM CHECKED OUT SUCCESSFULLY";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Cannot check out. Room is not booked";
    }
}

if (isset($_POST['insert'])) {
    $roomin = $_POST['roomin'];
    $rtype = $_POST['rtype'];
    $capacity = $_POST['capacity'];

    // Check if the room number already exists
    $check_existing_sql = "SELECT * FROM room WHERE RoomNo='$roomin'";
    $result_existing_room = $conn->query($check_existing_sql);

    if ($result_existing_room->num_rows > 0) {
        echo "Room number already exists. Please choose a different room number.";
    } else {
        // Room number doesn't exist, proceed with insertion
        $sql_insert = "INSERT INTO room (RoomNo, rtype, Capacity, Status) VALUES ('$roomin', '$rtype', '$capacity', 'available')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "New record inserted";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$sql_avail = "SELECT * FROM room WHERE Status='available'";
$result_avail = $conn->query($sql_avail);
echo "<h3>Available Rooms</h3>";
if ($result_avail->num_rows > 0) {
    while ($row = $result_avail->fetch_assoc()) {
        echo "Room number: " . $row['RoomNo'] . "<br>";
    }
} else {
    echo "No available rooms";
}

$sql_booked = "SELECT * FROM room WHERE Status='booked'";
$result_booked = $conn->query($sql_booked);
echo "<h3>Booked Rooms</h3>";
if ($result_booked->num_rows > 0) {
    while ($row = $result_booked->fetch_assoc()) {
        echo "Room number: " . $row['RoomNo'] . "<br>";
    }
} else {
    echo "No booked rooms";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Reservation</title>
</head>
<body>
    <h3>Check In/Check Out</h3>
    <form method="post" action="">
        <label>Room Number</label>
        <input type="text" name="room_number" />
        <button type="submit" name="checkin">Check In</button>
        <button type="submit" name="checkout">Check Out</button>
    </form>

    <h3>Insert Record</h3>
    <form method="post" action="">
        <label>Room Number</label>
        <input type="text" name="roomin" />
        <label>Room Type</label>
        <select name="rtype">
            <option value="single-semi">Single semi</option>
            <option value="double-semi">Double semi</option>
            <option value="single-deluxe">Single deluxe</option>
            <option value="double-deluxe">Double deluxe</option>
            <option value="dormitory">Dormitory</option>
        </select>
        <label>Capacity</label>
        <input type="number" name="capacity" />
        <button type="submit" name="insert">Insert Record</button>
    </form>
</body>
</html>
