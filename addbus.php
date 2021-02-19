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

$sql = "INSERT INTO bus (name, from, to, seats, price, id)
VALUES ('$_POST[busname]', '$_POST[from]', '$_POST[to]', '$_POST[seats]', '$_POST[price]','$_POST[id]')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully" . "<br>";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * from bus";
$result = $conn->query($sql);
echo "Complete Table Values as below: " . "<br>";
if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border=1><tr><th>Bus Name</th><th>From</th><th>To</th><th>Seats</th><th>price</th><th>Bus ID</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["from"]."</td><td>".$row["to"]."</td><td>".$row["seats"]."</td><td>".$row["price"]."</td></td>".$row["id"]."</td></tr>";
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