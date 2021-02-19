<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT bid,from,to,no,price*no from agent, ticket,addbus where name='$_POST[agentname] and id=aid and bid=tid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1'><tr><th>Bus ID</th><th>from</th><th>to</th><th>No.of Tickets</th><th>Fare</th></tr>";
  while($row = $result->fetch_assoc()) {
    	echo "<tr>";
	echo "<td>" . $row['bid'] . "</td>";
	echo "<td>" . $row['from'] . "</td>";
	echo "<td>" . $row['to'] . "</td>";
	echo "<td>" . $row['no'] . "</td>";
	echo "<td>" . $row['price'] . "</td>";
	echo "</tr>";
  }
echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>