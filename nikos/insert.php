<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB_012";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$_GET[fname]', '$_GET[lname]', '$_GET[email]')";
if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
    header('Location: select.php');
} else { echo "Error: " . $sql . "<br>" . $conn->error; } $conn->close(); ?>

