<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$name=$_POST["name"];
$age=$_POST["age"];
$gender=$_POST["gender"];
$email=$_POST["phone"];
$mobility=$_POST["email"];
$sensory=$_POST["sensory"];
$nonsensory=$_POST["nonsensory"];
$sql = "INSERT INTO profile (name, age, gender,phone,email,mobility,sensory,nonsensory)
VALUES ('$name','$age','$gender','$phone','$email','$mobility','$sensory','$nonsensory')";

if ($conn->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>