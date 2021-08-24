<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="https://www.facebook.com/Paradise.NightLife/" target="_blank"><strong>Paradise Facebook</strong></a>
                    &copy;
                    <a class="text-muted" href="https://www.facebook.com/NCDuongg/" target="_blank"><strong>Paradise Admin</strong></a>
                    &copy;
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://www.ncduong.info/@NC.Duong/" target="_blank">Liên hệ Hỗ Trợ éo èo</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php
if(empty($_SESSION['admin_login'])){
    header('location: login.php');
}
?>