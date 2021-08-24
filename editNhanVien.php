<?php ?>
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
        <main class="d-flex w-100">
            <div class="container d-flex flex-column">
                <div class="row vh-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">
                            <div class="text-center mt-4">
                                <h1 class="h2">Sửa nhân viên</h1>
                                <p class="lead">
                                    Hãy điền đúng thông tin nhé!!
                                </p>
                            </div>
                            <?php
                            if ($admin['status'] == 1) {
                                include './include/config/connect.php';
                                if (!empty($_GET['idnvAdmin'])) {
                                    $id = $_GET['idnvAdmin'];
                                    $sql = "SELECT * FROM admin WHERE admin.id = '$id'";
                                    $adminstatus = $admin['status'];
                                    $admin = mysqli_fetch_array(mysqli_query($conn, $sql));
                                }
                            }
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <div class="m-sm-4">
                                        <form action="editNhanvienAPI.php" method="POST">
                                            <input class="form-control form-control-lg" type="text" name="idnv"
                                                   required="required"
                                                   placeholder="" value="<?php echo $admin['id'] ?>" hidden/>
                                            <div class="mb-3">
                                                <label class="form-label">Tên</label>
                                                <input class="form-control form-control-lg" type="text" name="name"
                                                       required="required"
                                                       placeholder="" value="<?php echo $admin['name'] ?>" disabled/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tài Khoản</label>
                                                <input class="form-control form-control-lg" type="text" name="username"
                                                       required="required"
                                                       placeholder="" value="<?php echo $admin['username'] ?>"
                                                       disabled/>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Mật Khẩu</label>
                                                <input class="form-control form-control-lg" type="password"
                                                       name="password"
                                                       required="required"
                                                       placeholder="Mật khẩu mới"/>
                                            </div>
                                            <?php if(!empty($adminstatus)): ?>
                                            <div class="mb-3">
                                                <label class="form-label">Chức Vụ</label>
                                                <select class="form-select mb-3" name="status">
                                                    <option value="1" <?php echo $admin['status'] ==1 ? 'selected' : ''?>>Quản Lý</option>
                                                    <option value="0"<?php echo $admin['status'] ==0 ? 'selected' : ''?>>Nhân Viên</option>
                                                </select>
                                            </div>
                                            <?php endif?>
                                            <div class="mb-3">
                                                <?php if (!empty($_GET['action'])) : ?>
                                                    <label class="form-label text-danger">Số điện thoại bị trùng roài
                                                        bạn</label>
                                                <?php endif ?>
                                            </div>
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-lg btn-primary"><i
                                                            data-feather="save"></i> Lưu
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

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