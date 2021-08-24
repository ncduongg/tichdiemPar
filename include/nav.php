<?php
    session_start();
    if(!empty($_SESSION['admin_login'])){
        $name =  $_SESSION['admin_login']['name'];
        $admin =  $_SESSION['admin_login'];
    }else{
        header('location: login.php');
    }
?>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <span class="align-middle">Paradise Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Trang Chủ</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./addKhachhang.php">
                    <i class="align-middle" data-feather="user-plus"></i> <span
                            class="align-middle">Thêm khách hàng</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./infoNhanvien.php">
                    <i class="align-middle" data-feather="user"></i> <span
                            class="align-middle">Thông tin nhân viên</span>
                </a>
            </li>
            <?php if ($admin['status'] == 1) : ?>
                <li class="sidebar-header">
                    Admin
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="listNhanvien.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Danh sách nhân viên</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="addNhanvien.php">
                        <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Thêm nhân viên</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>