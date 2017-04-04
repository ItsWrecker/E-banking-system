<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT * FROM transaction WHERE user_id=10";

$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - date: " . $row["date"]. " " . $row["trans_id"]."Amt". $row["amt"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
								
?>

