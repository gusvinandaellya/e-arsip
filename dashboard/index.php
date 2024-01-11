<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$arsip = mysqli_query($connection, "SELECT COUNT(*) FROM arsip");
$user = mysqli_query($connection, "SELECT COUNT(*) FROM login");
$terakhirlogin = mysqli_query($connection, "SELECT terakhir_login FROM login WHERE id = '" . $_SESSION['login']['id'] . "'");

$total_arsip = mysqli_fetch_array($arsip)[0];
$total_user = mysqli_fetch_array($user)[0];
?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="column">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_user ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Arsip</h4>
                        </div>
                        <div class="card-body">
                            <?= $total_arsip ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Terakhir Login</h4>
                        </div>
                        <?php
                        $result = mysqli_fetch_object($terakhirlogin);
                        ?>

                        <div class="card-body">
                            <?= $result->terakhir_login ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>