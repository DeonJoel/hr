<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; 
            padding: 0;
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(background.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #faf5f5e8;
        }
        
        form {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 420px;
            background: transparent;
            border:  2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(10px);
            color: #fff;
            border-radius: 12px;
            padding: 30px 40px;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"],
        select,
        input[type="time"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial Black, sans-serif; /* Font style added */
        }

        input[type="submit"] {
            width: 100%;
            height: 50px;
            background: #4febeb;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 1.0em;
            color: #333;
            font-weight: 600;
            transition: 0.5s;
            margin-bottom: 10px; 
        }

        input[type="submit"]:hover {
            background: rgb(0,0,0,0.3);
            color: #fff;
        }
    </style>
</head>
<body id="attendance-page">
    <form action="" method="post">
        <h1>Attendance Page</h1>
        <label for="eid">Emp id:</label>
        <input type="text" id="eid" name="eid" required><br><br>
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="">Select Department</option>
            <option value="Sales">Sales</option>
            <option value="Finance">Finance</option>
            <option value="IT">IT</option>
            <option value="Recruitment">Recruitment</option>
             <!-- Add more options as needed -->
        </select><br><br>
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required><br><br>
        <label for="login_time">Login Time:</label>
        <input type="time" id="login_time" name="login_time" required><br><br>
        
        <label for="logout_time">Logout Time:</label>
        <input type="time" id="logout_time" name="logout_time" required><br><br>
        
        <label for="place">place:</label>
        <select id="place" name="place" required>
            <option value="">Select place</option>
            <option value="office">office</option>
            <option value="field">field</option>
            <option value="workfromhome">workfromhome</option>
        </select><br><br>
        
        <input type="submit" value="Submit" name="submit">
    </form>
    <script>
        document.getElementById("attendance-form").addEventListener("submit", function(event) {
            alert("Attendance submitted successfully!");
        });
    </script>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hr_management";
    $table = "attendenece";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if(isset($_POST['submit']))
    {
    $eid=$_POST['eid'];
    $dpt=$_POST['department'];
    $date=$_POST['date'];
    $login_time=$_POST['login_time'];
    $logout_time=$_POST['logout_time'];
    $place=$_POST['place'];
    $login_datetime_str = $date . ' ' . $login_time;
    $logout_datetime_str = $date . ' ' . $logout_time;
    $login_timestamp = strtotime($login_datetime_str);
    $logout_timestamp = strtotime($logout_datetime_str);

    // Calculate the difference in seconds
    $time_worked_in_seconds =  $logout_timestamp - $login_timestamp;

    // Check if the logout time is after the login time
    if ($time_worked_in_seconds < 0) {
        echo "Logout time must be after login time.";
        exit;
    }

    // Convert the time worked into hours, minutes, and seconds
    $hours = floor($time_worked_in_seconds / 3600);
    $minutes = floor(($time_worked_in_seconds % 3600) / 60);
    $seconds = $time_worked_in_seconds % 60;

    // Format the output
    $time_worked = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

    $sql="INSERT INTO `attendance`( `emp_id`, `atten_date`, `signin_time`, `signout_time`, `working_hour`, `place`)
     VALUES ('$eid','$date','$login_time','$logout_time','$time_worked','$place')";
     if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ATTENDENCE ENTERD');</script>";
    } else {
        echo"<script>alert(". $conn->error.");</script>" ;
    }
    
    $conn->close();
}
    ?>
</body>
</html>
