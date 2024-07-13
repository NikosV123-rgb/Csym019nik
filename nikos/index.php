
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
// Δημιουργία connection
$conn = new mysqli($servername, $username, $password);
// Έλεγχος connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} echo "Connected successfully"; ?>
    </body>
</html>
