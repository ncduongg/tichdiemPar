<?php
include './include/config/connect.php';
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
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tìm kiếm khách hàng</h5>
                                </div>
                                <?php
                                if (!empty($_POST['phoneTimkiem'])) {
                                    $timkiem = $_POST['phoneTimkiem'];
                                    $sql1 = "SELECT * FROM khachhang WHERE khachhang.phone LIKE '%$timkiem%'";
                                    $queryz = mysqli_query($conn, $sql1);
                                }
                                ?>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <input type="text" name="phoneTimkiem" class="form-control"
                                               placeholder="Nhập số điện thoại">
                                        <br/>
                                        <button class="btn btn-primary"><i
                                                    data-feather="arrow-right-circle"></i> Tìm kiếm
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($_POST['phoneTimkiem'])) { ?>
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Kết quả tìm kiếm của : <?php echo $_POST['phoneTimkiem'] ?> </h5>
                            </div>
                            <table class="table table-responsive my-0">
                                <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th class="d-none d-xl-table-cell">Số ĐT</th>
                                    <th>Trạng thái KH</th>
                                    <th class="">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($queryz as $k => $item) : ?>
                                    <tr>
                                        <td><?php echo $item['name'] ?></td>
                                        <td class="d-none d-xl-table-cell"><?php echo $item['phone'] ?></td>
                                        <td><span class="badge bg-success">Good</span></td>
                                        <td class="badge d-md-table-cell">
                                            <a name="" id="" class="btn btn-success"
                                               href="quanly.php?id=<?php echo $item['id'] ?>" role="button">Quản
                                                Lý</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                $sql = 'SELECT * FROM khachhang';
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Danh sách khác hàng</h5>
                                </div>
                                <table class="table table-responsive my-0">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th class="d-none d-xl-table-cell">Số ĐT</th>
                                        <th>Trạng thái KH</th>
                                        <th class="">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($query as $k => $item) : ?>
                                        <tr>
                                            <td><?php echo $item['name'] ?></td>
                                            <td class="d-none d-xl-table-cell"><?php echo $item['phone'] ?></td>
                                            <td><span class="badge bg-success">Good</span></td>
                                            <td class="badge d-md-table-cell">
                                                <a name="" id="" class="btn btn-success"
                                                   href="quanly.php?id=<?php echo $item['id'] ?>" role="button">Quản
                                                    Lý</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <?php require './include/footer.php' ?>
    </div>
</div>

<script src="js/app.js"></script>
</body>
</html>