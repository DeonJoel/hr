<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "hr_management"; // The database name you created earlier

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = $_POST['employeeId'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $joiningDate = $_POST['joiningDate'];
    $leavingDate = $_POST['leavingDate'];
    $department = $_POST['department'];
    
    $sql = "INSERT INTO Resignation (employee_id, username, password, phone, joining_date,Leaving_date, department) VALUES ( '$employeeId', '$username', 'password', '$phone', '$joiningDate', '$leavingDate', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "Resignation submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
