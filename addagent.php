<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$id = rand(1001,9999);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO agent (name, number, password, id)
VALUES ('$_POST[agentname]', '$_POST[mobile]', '$_POST[password]', '$id')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully" . "<br>";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * from agent";
$result = $conn->query($sql);
echo "Complete Table Values as below: " . "<br>";
if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border=1><tr><th>Agent Name</th><th>Number</th><th>Password</th><th>id</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["number"]."</td><td>".$row["password"]."</td><td>".$row["id"]."</td></tr>";
    }
}
else
{
  echo "0 results";
}
echo "</table>";
$conn->close();
?>
</body>
</html>