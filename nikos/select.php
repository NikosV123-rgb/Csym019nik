<div>
    <a href="insert.html">Enter new record</a>
</div>
<p>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB_012";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} $sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
} } else { echo "0 results"; } $conn->close(); ?></p>

