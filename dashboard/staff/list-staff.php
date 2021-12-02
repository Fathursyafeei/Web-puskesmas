<?php
include_once("../../lib/connection.php");

// $staffs = mysqli_query($connection, "SELECT * FROM staffs");

$jlhDataPerHalaman = 5;
$data = mysqli_query($connection, "SELECT * FROM staffs");
$jlhData = mysqli_num_rows($data);
$jlhHalaman = ceil($jlhData / $jlhDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

$awalData = ($jlhDataPerHalaman * $halamanAktif) - $jlhDataPerHalaman;

$staffs = mysqli_query($connection, "SELECT * FROM staffs LIMIT $awalData, $jlhDataPerHalaman");


if (isset($_POST["cari"])) {
  $keyword = $_POST["keyword"];
  $cari = mysqli_query($connection, "SELECT * FROM staffs WHERE 
  nama LIKE '%" . $keyword . "%' OR 
  nip LIKE '%" . $keyword . "%' OR 
  jabatan LIKE '%" . $keyword . "%' 
  ");
  $staffs = $cari;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Layout &rsaquo; Default &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->

  <!-- FavIcon -->
  <link rel="shortcut icon" href="../../assets/img/logo-puskesmas.png" />

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b>
                    <p>Hello, Bro!</p>
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Dedik Sugiharto</b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                    <div class="is-online"></div>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Agung Ardiansyah</b>
                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Ardian Rahardiansyah</b>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                    <div class="time">16 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-avatar">
                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Alfa Zulkarnain</b>
                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand text-break">
            <a href="index.html">
              <img src="../../assets/img/logo-puskesmas.png" alt="" width="24px" height="auto">
              UPT Puskemas Kentara</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><img src="../../assets/img/logo-puskesmas.png" alt="" width="24px" height="auto"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
              <a href="../index-0.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Staff/ Pegawai</li>
            <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Staff/Pegawai</span></a>
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="./list-staff.php">Search Staff/ Pegawai</a></li>
                <li><a class="nav-link" href="./laporan-staff.php">Laporan Staff / Pegawai </a></li>
                <li><a class="nav-link" href="./create-staff.php"> Input Staff / Pegawai </a></li>
              </ul>
            </li>
            <li class="menu-header">Obat</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Informasi Obat</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="../errors-404.php">List Obat</a></li>
                <li><a class="nav-link" href="../errors-404.php">Edit Obat </a></li>
                <li><a class="nav-link" href="../errors-404.php"> Input data Obat </a></li>

              </ul>
            </li>

            <li class="menu-header">Barang Inventory</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Informasi Barang</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="../errors-404.php">List Barang</a></li>
                <li><a class="nav-link" href="../errors-404.php">Edit Barang </a></li>
                <li><a class="nav-link" href="../errors-404.php"> Input Barang </a></li>
              </ul>
            </li>

            <li class="menu-header">Fasilitas Puskesmas</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Informasi Fasilitas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="../errors-404.php">List Fasilitas</a></li>
                <li><a class="nav-link" href="../errors-404.php">Edit Fasilitas </a></li>
                <li><a class="nav-link" href="../errors-404.php"> Input Fasilitas</a></li>

              </ul>
            </li>

            <li class="menu-header"></li>
            <li class=" dropdown "><a class="nav-link" href="../errors-404.php" data-toggle="dropdown">
                <i class="fas fa-columns"></i>
                <span>Agenda
                  Puskesmas</span></a></li>
            <li><a class="nav-link" href="../errors-404.php">FAQ </a></li>


          </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>List Staff</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Staff & Pegawai</a></div>
              <div class="breadcrumb-item">List Staff & Pegawai</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Cari Staff & Pegawai</h2>
            <p class="section-lead">Layanan Untuk mengakses daftar sumber daya manusia yang ada di Puskesmas
              Kentara.
            </p>
            <div class="card">
              <div class="card-header d-flex flex-row justify-content-between ">
                <h4>Tabel Staff & Pegawai</h4>
                <form action="" method="post" class="search-bar d-flex flex-row">
                  <input class="form-control" type="search" name="keyword" autofocus autocomplete="off" placeholder="Masukkan Keyword" aria-label="Search" data-width="250">
                  <button class="btn" type="submit" name="cari"><i class="fas fa-search"></i></button>
                </form>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-md text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NIP</th>
                      <th>Jabatan</th>
                      <th>Action</th>
                    </tr>
                    <?php $i = 0;

                    ?>
                    <?php while ($staff = mysqli_fetch_assoc($staffs)) :
                    ?>
                      <tr>
                        <?php $i++ ?>
                        <td><?= $i ?></td>
                        <td><?= $staff["nama"] ?></td>
                        <td><?= $staff["nip"] ?></td>
                        <td><?= $staff["jabatan"]; ?></td>
                        <td><a id='edit_data' data-toggle='modal' data-target='#modal_staff' href='detail-staff.php?id=<?= " " . "$staff[id] " . "" ?>'>Detail</a></td>

                      <?php endwhile; ?>
                  </table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    <?php if (!isset($_POST["cari"])) : ?>

                      <!-- pag-left -->
                      <?php if ($halamanAktif > 1) : ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman= <?= $halamanAktif - 1 ?>" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                      <?php else : ?>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                      <?php endif ?>

                      <!-- pag-num -->
                      <?php for ($i = 1; $i <= $jlhHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?> <span class="sr-only">(current)</span></a></li>
                        <?php else : ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endfor; ?>

                      <!-- pag-right -->
                      <?php if ($halamanAktif < $jlhHalaman) : ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman= <?= $halamanAktif + 1 ?>" tabindex="-1"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      <?php else : ?>
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      <?php endif ?>

                    <?php endif ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>


      <div class="modal" id="modal_staff" tabindex="-1" role="dialog" aria-labelledby="staff" aria-hidden="true"></div>
      <!-- End of Modal -->

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Faturahman
            Bancin</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../assets/modules/jquery.min.js"></script>
  <script src="../assets/modules/popper.js"></script>
  <script src="../assets/modules/tooltip.js"></script>
  <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../assets/modules/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('a#edit_data').click(function() {
        var url = $(this).attr('href');
        $.ajax({
          url: url,
          success: function(response) {
            $('#modal_staff').html(response);
          }
        });
      });

    });
  </script>

  <!-- Page Specific JS File -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="../assets/js/page/bootstrap-modal.js"></script>


  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>
</body>

</html>