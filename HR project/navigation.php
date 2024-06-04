<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $navBtn = $_POST['navBtn'];
    if ($navBtn === 'D') {
        include "leave.php";
    } elseif ($navBtn === 'A') {
        include "attendance.php";
    } elseif ($navBtn === 'Dep') {
        include "department.php";
    }elseif ($navBtn === 'L') {
        include "applyLeave.php";
    }elseif ($navBtn === 'R') {
        include "ResignForm.php";
    }else {
        echo "Invalid navigation.";
    }
}
?>