<?php
 // Database connection configuration
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "hr_management";
 // Create a database connection
 @$conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 if (isset($_POST['calculateSalary'])) {
 $employeeName = $_POST['employeeName'];
 $department = $_POST['department'];
 $basicSalary = $_POST['basicSalary'];
 // Constants for salary calculation
 $daPercentage = 0.5; // 50% of basic salary
105
 $hraPercentage = 0.3; // 30% of basic salary
 $pfPercentage = 0.1; // 10% of basic salary
 $taxPercentage = 0.15; // 15% of gross salary
 // Calculate department-specific allowances
 switch ($department) {
 case 'Software-Testing':
 $daPercentage += 0.1; // Additional 10% for IT department
 $hraPercentage += 0.05; // Additional 5% for IT department
 break;
 case 'Engineering':
 $daPercentage += 0.15; // Additional 15% for Finance department
 $hraPercentage += 0.1; // Additional 10% for Finance department
 break;
 case 'Web-developer':
 $daPercentage += 0.12; // Additional 12% for Sales department
 $hraPercentage += 0.08; // Additional 8% for Sales department
 break;
 }
 // Retrieve employee name based on ID
 $nameQuery = "SELECT name FROM register WHERE id = '$employeeName'";
 $nameResult = mysqli_query($conn, $nameQuery);
 if (mysqli_num_rows($nameResult) > 0) {
 $row = mysqli_fetch_assoc($nameResult);
 $employeename = $row['name'];
 // Check if the salary was added within the last 30 days
 $currentDate = date("Y-m-d");
 $checkQuery = "SELECT added_date FROM salary WHERE empid = '$employeeName' 
ORDER BY added_date DESC LIMIT 1";
 $checkResult = mysqli_query($conn, $checkQuery);
 if (mysqli_num_rows($checkResult) > 0) {
 $lastAddedDate = mysqli_fetch_assoc($checkResult)['added_date'];
 $diff = abs(strtotime($currentDate) - strtotime($lastAddedDate));
 $daysDifference = floor($diff / (60 * 60 * 24));
106
 if ($daysDifference < 30) {
 echo "<script>alert('Salary was already added within the last 30 days'); </script>";
 exit;
 }
 }
 // Calculate salary components
 $da = $basicSalary * $daPercentage;
 $hra = $basicSalary * $hraPercentage;
 $pf = $basicSalary * $pfPercentage;
 $grossSalary = $basicSalary + $da + $hra;
 $tax = $grossSalary * $taxPercentage;
 $netPay = $grossSalary - $pf - $tax;
 $insertSql = "INSERT INTO salary (empid, employee_name, department, basic_salary, pf)
 VALUES ('$employeeName', '$employeename', '$department', '$basicSalary','$pf', CURRENT_DATE)";
if (mysqli_query($conn, $insertSql)) {
echo "<script>alert('Salary added Successfully'); </script>";
} else {
echo "Error adding notice: " . mysqli_error($conn);
}
 }
}
