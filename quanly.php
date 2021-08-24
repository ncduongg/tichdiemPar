<?php
include './include/config/connect.php';
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
          content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png"/>

    <link rel="canonical" href="https://demo-basic.adminkit.io/"/>

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<div class="wrapper">
    <?php require './include/nav.php' ?>
    <div class="main">
        <?php require './include/header.php' ?>
        <main class="content">
            <div class="container-fluid p-0">
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">Thông Tin Khách Hàng</h1>
                </div>
                <?php
                $sql = "SELECT * FROM khachhang WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);
                $khachhang = mysqli_fetch_array($query);
                ?>
                <?php if (!empty($khachhang)) : ?>
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <img src="img/avatars/avatar-4.jpg" alt="Christina Mason"
                                     class="img-fluid rounded-circle mb-2" width="128" height="128"/>
                                <h5 class="card-title mb-0"><?php echo $khachhang['name'] ?></h5>
                                <div class="text-muted mb-2"></div>

                                <div>
                                    <a class="btn btn-primary btn-sm" href="#"><?php echo $khachhang['phone'] ?></a>
                                </div>
                            </div>
                            <hr class="my-0"/>
                            <div class="card-body">
                                <h5 class="h6 card-title">Thao Tác</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1">
                                        <a name="" id="" class="btn btn-success"
                                           href="tichdiemAPI.php?idnv=<?php echo $admin['id'] ?>&idkh=<?php echo $khachhang['id'] ?>"
                                           onclick="return confirm('Bạn muốn tích điểm cho <?php echo $khachhang['name'] ?> ?')"
                                           role="button">Tích Điểm</a>
                                    </li>
                                    <?php if ($admin['status'] == 1) : ?>
                                        <li class="mb-1">
                                            <button type="button" class="btn btn-danger">Xóa Khách Hàng</button>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql1 = "SELECT khachhang.name as namekn, admin.name as namenv, admin.id as idnv, khachhang.id as idkh, tichdiem.datetimeCreate FROM tichdiem JOIN khachhang ON khachhang.id = tichdiem.idkh JOIN admin ON admin.id = tichdiem.idnv WHERE khachhang.id = '$id' ORDER BY tichdiem.datetimeCreate DESC";
                    $query = mysqli_query($conn, $sql1);
                    ?>
                    <div class="col-md-8 col-xl-9">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Lịch sử tích điểm</h5>
                            </div>
                            <?php $i = 0 ?>
                            <div class="card-body h-100">
                                <?php foreach ($query as $k => $item) { ?>
                                    <div class="d-flex align-items-start">
                                        <img src="img/avatars/avatar-5.jpg" width="36" height="36"
                                             class="rounded-circle me-2" alt="Vanessa Tucker">
                                        <div class="flex-grow-1">
                                            <?php $i += 10 ?>
                                            <small class="text-muted"><?php echo $item['datetimeCreate'] ?></small>
                                            <br/> Nhân viên
                                            <strong><?php if ($admin['status'] == 1) {
                                                    echo $item['namenv'];
                                                } elseif ($admin['id'] == $item['idnv']) {
                                                    echo $item['namenv'];
                                                } else {
                                                    echo 'Ẩn danh';
                                                } ?></strong> đã tích điểm cho
                                            <strong><?php echo $item['namekn'] ?></strong> (+10)<br/>
                                            <br/>
                                        </div>
                                    </div>
                                    <hr/>
                                <?php } ?>
                            </div>
                            <div class="card-header">
                                <h5 class="card-title mb-0">Điểm hiện tại : <?php echo $i ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            Ố ồ ID này không tồn tại. muốn hack gì bạn trẻ?
                        </div>
                    <?php endif; ?>

                </div>
        </main>
        <?php require './include/footer.php' ?>
    </div>
</div>
<hr/>
<script src="js/app.js"></script>
<script>
</script>
</body>
</html>