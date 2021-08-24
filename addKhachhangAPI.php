<?php
include './include/config/connect.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$sqlcheck = "SELECT khachhang.phone FROM khachhang WHERE phone = '$phone'";
$sr = mysqli_query($conn,$sqlcheck);
if (mysqli_num_rows($sr) != 1) {
    $sql = "INSERT INTO khachhang (id, name, phone,status) VALUES (NULL, '$name', '$phone',0)";
    if (mysqli_query($conn, $sql)) {
        $sql1 = "SELECT * FROM khachhang WHERE phone = '$phone'";
        $query = mysqli_query($conn, $sql1);
        $khachhang = mysqli_fetch_array($query);
        $id = $khachhang['id'];
        header("location: quanly.php?id=" . $id);
    } else {
        echo 'Lỗi không thêm được :D';
    }
} else {
    header("location: addKhachhang.php?action=sdttrung");
}
?>