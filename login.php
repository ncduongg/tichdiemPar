<?php
session_start();
include './include/config/connect.php';
if (!empty($_SESSION['admin_login'])) {
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
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign In | AdminKit Demo</title>
    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Đăng nhập vào tài khoản của bạn
                        </p>
                    </div>
                    <?php
                    $error = [];
                    if (isset($_POST['username'])) {
                        $user = $_POST['username'];
                        $pass = $_POST['password'];
                        $sqlCommand = "SELECT * FROM admin WHERE username = '$user'";
                        $query = mysqli_query($conn, $sqlCommand);
                        if (mysqli_num_rows($query) == 1) {
                            $admin = mysqli_fetch_assoc($query);
                            $passVerify = $admin['password'];
                            if ($pass == $passVerify) {
                                $_SESSION['admin_login'] = $admin;
                                header("location: index.php");
                            } else {
                                $error['loilogin'] = 'Mật khẩu sai';
                            }
                        } else {
                            $error['loiemail'] = 'Tài khoản sai nha';
                        }
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="img/avatars/avatar.jpg" alt="Charles Hall"
                                         class="img-fluid rounded-circle" width="132" height="132"/>
                                </div>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Tài khoản</label>
                                        <input class="form-control form-control-lg" type="username" name="username"
                                               placeholder="ID"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                               placeholder="Password"/>
                                        <small>
                                            <a href="https://fb.me/ncduongg">Quên mật khẩu?</a>
                                        </small>
                                    </div>
                                    <?php if (!empty($error['loilogin'])): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error['loilogin'] ?>
                                        </div>
                                    <?php endif; ?>
                                     <?php if (!empty($error['loiemail'])): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error['loiemail'] ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Đăng Nhập</button>
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

<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>