<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.php">
                <img src="../assets/img/logo_demak.png" alt="logo" width="30px"> ARSIP SETDA DEMAK
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">EA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="../"><i class="fas fa-fire"></i> <span>Home</span></a></li>
            <li class="menu-header">Main Feature</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-archive"></i>
                    <span>Arsip</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="../jenisarsip/index.php">Kode Klasifikasi</a></li>
                    <li><a class="nav-link" href="../arsip/index.php">Input Arsip</a></li>
                </ul>
            </li>
            <li>
                <a href="../temubalik/index.php" class="nav-link"><i class="fas fa-search"></i> <span>Temu Balik</span></a>
                <!--                <ul class="dropdown-menu">-->
                <!--                    <li><a class="nav-link" href="../mahasiswa/index.php">List</a></li>-->
                <!--                    <li><a class="nav-link" href="../mahasiswa/create.php">Tambah Data</a></li>-->
                <!--                </ul>-->
            </li>
          <?php if ($_SESSION['login']['role'] == 1): ?>
              <li class="menu-header">Admin</li>
              <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Akun</span></a>
                  <ul class="dropdown-menu">
                      <li><a class="nav-link" href="../akun/index.php">List</a></li>
                      <li><a class="nav-link" href="../akun/create.php">Tambah Data</a></li>
                  </ul>
              </li>
          <?php endif; ?>

            <li><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a>
            </li>
        </ul>
    </aside>
</div>