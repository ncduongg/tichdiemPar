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
                    <h1 class="h3 d-inline align-middle">Thông Tin Nhân Viên</h1>
                </div>
                <?php
                include './include/config/connect.php';
                if ($admin['status'] == 1) {
                    $sql = "SELECT * FROM admin";
                    $query = mysqli_query($conn, $sql);
                    $admins = mysqli_fetch_array($query);
                }else{
                   echo  'Bạn không có quyền vào đây!'; die();
                }
                ?>
                <div class="row">
                    <?php foreach ($query as $k => $admins) : ?>
                        <div class="col-md-4 col-xl-3">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <img src="img/avatars/avatar-4.jpg" alt="Christina Mason"
                                         class="img-fluid rounded-circle mb-2" width="128" height="128"/>
                                    <h5 class="card-title mb-0"><?php echo $admins['name'] ?></h5>
                                    <div class="text-muted mb-2"></div>

                                    <div>
                                        <a class="btn btn-primary btn-sm"
                                           href="#"><?php echo $admins['status'] == 1 ? 'Quản Lý' : 'Nhân Viên' ?></a>
                                    </div>
                                </div>
                                <hr class="my-0"/>
                                <div class="card-body">
                                    <h5 class="h6 card-title">Thao Tác</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-1">
                                            <a class="btn btn-danger"
                                               href="editNhanVien.php?idnvAdmin=<?php echo $admins['id'] ?>"
                                               role="button">Sửa thông tin</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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