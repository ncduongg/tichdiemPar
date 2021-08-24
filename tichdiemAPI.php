<?php
include './include/config/connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$idKH = $_GET['idkh'];
$idNV = $_GET['idnv'];
$date =  date('Y-m-d G:i:s');
$sql =  "INSERT INTO tichdiem(id,idkh,idnv,datetimeCreate) values(NULL,'$idKH','$idNV','$date')";
if(mysqli_query($conn,$sql)){
    header("location: quanly.php?id=".$idKH);
}

?>
