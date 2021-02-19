<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$count = "select seats from bus where id = '$_POST[busid]'";
$result = $conn->query($sql);
if(((int)$result)>=((int)$_POST[no]))
{
$sql = "INSERT INTO ticket (bid, from, to, no)
VALUES ('$_POST[busid]', '$_POST[from]', '$_POST[to]', '$_POST[no]')";

if ($conn->query($sql) === TRUE) {
  echo "Booked Ticket successfully" . "<br>";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "SELECT * from ticket";
$result = $conn->query($sql);
echo "Complete Table Values as below: " . "<br>";
if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border=1><tr><th>BusID</th><th>From</th><th>To</th><th>No.of Tickets</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["bid"]."</td><td>".$row["from"]."</td><td>".$row["to"]."</td><td>".$row["no"]."</td></tr>";
    }
}
}
else
{
  echo "Bus is Full, please try another bus";
}
echo "</table>";
$conn->close();
?>
</body>
</html>