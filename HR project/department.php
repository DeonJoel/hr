<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr_management"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, dep_name FROM department";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['dep_name'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No departments found.";
}

$conn->close();
?>
