<div>
    <a href="courseentryform.html">Enter new course</a>
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
} $sql = "SELECT * FROM courses";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "Title: " . $row["title"]. " <br> Overview: " . $row["overview"]." <br> Highlights: " . $row["highlights"]. " <br> Course Details: " . $row["course_details"]."<br> Entry Requirements: " . $row["entry_requirements"]."<br> Fees and Funding: " . $row["fees_and_funding"]."<br> FAQs: " . $row["faqs"]."<br><hr>";
} } else { echo "0 results"; } $conn->close(); ?></p>

