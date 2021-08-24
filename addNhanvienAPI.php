<?php
include './include/config/connect.php';
$user = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$status = $_POST['status'];
$sql = "SELECT * FROM admin WHERE username = '$user'";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) == 1) {
    header("Location: addNhanvien.php?action=usertrung" );
} else {
    $sqlz = "INSERT INTO admin(id,username,password,name,status) VALUES (NULL,'$user','$password','$name','$status')";
    if (mysqli_query($conn, $sqlz)) {
        header("location: listNhanvien.php");
    } else {
        echo "Lỗi rồi @@";
    }
}
?>