<?php
include './include/config/connect.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$sqlcheck = "SELECT khachhang.phone FROM khachhang WHERE phone = '$phone'";
?>