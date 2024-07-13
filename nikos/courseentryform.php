<div>
    <a href="courseentryform.html"> Enter a new course</a>
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
}
$sql = "INSERT INTO Courses (title, overview, highlights, course_details, entry_requirements, fees_and_funding, faqs)
VALUES ('".$_POST['title']."', '".$_POST['overview']."', '".$_POST['highlights']."', '".$_POST['course_details']."', '".$_POST['entry_requirements']."', '".$_POST['fees_and_funding']."', '".$_POST['faqs']."')";
if ($conn->query($sql) === TRUE) {
//echo "New record created successfully";
    header('Location: courseselect.php');
} else { echo "Error: " . $sql . "<br>" . $conn->error; } $conn->close(); ?></p>

