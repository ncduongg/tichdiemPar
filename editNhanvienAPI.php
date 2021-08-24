<?php
include './include/config/connect.php';
$password = $_POST['password'];
$id = $_POST['idnv'];
if (!isset($_POST['status'])) {
    echo "??";
    $sql = "UPDATE admin SET admin.password = '$password' WHERE admin.id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("location: infoNhanvien.php");
    } else {
        header("location: editNhanvien.php?action=thatbai");
    }
}else{
    $status = $_POST['status'];
    $sql = "UPDATE admin SET admin.password = '$password',admin.status ='$status' WHERE admin.id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("location: listNhanvien.php");
    } else {
        header("location: editNhanvien.php?action=thatbai");
    }
}
//?>