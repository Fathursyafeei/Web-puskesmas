<?php

include_once('../lib/connection.php');
include_once('../lib/helper.php');

$success = FALSE;
$dup = FALSE;

if ($_POST) {
  $data = Helper::arrayInputSanitizer($_POST, $connection);
  unset($data['submit']);

  $check = $connection->query(sprintf("SELECT * FROM users WHERE email='%s'", $data['email']));
  if (empty($check->fetch_assoc())) {
    $query = "INSERT INTO users (nama, nip, jabatan, email, password) VALUE ('%s', '%s', %d, '%s', '%s')";
    $query = sprintf($query, $data['nama'], $data['nip'], intval($data['jabatan']), $data['email'], $data['password']);

    if ($connection->query($query))
      $success = TRUE;
    else
      die('Something Error!');
  } else {
    $dup = TRUE;
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Custom Css -->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/auth.css">

  <!-- Phosphor Icon -->
  <script src="https://unpkg.com/phosphor-icons"></script>

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


  <!-- FavIcon -->
  <link rel="shortcut icon" href="../assets/img/logo-puskesmas.png">
  <title>Registrasi | UPT PUSKESMAS KENTARA</title>

</head>

<body>
  <!-- Navbar -->
  <nav class="
        navbar
        sticky-top
        navbar-expand-lg navbar-light
        navCustom
        shadow-sm
      " id="Navbar">
    <div class="container-fluid">
      <div class="nav-bar">
        <button class="navbar-toggler btn-Nav border-0 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="ph-rows-fill"></i></span>
        </button>
        <a class="navbar-brand page-scroll" href="../index.php">
          <div class="digital">
            <img src="../assets/img/logo-puskesmas.png" alt="" width="35" height="auto" class="img-fluid" />
            <span class="fs-6">UPT PUSKESMAS KENTARA</span>
          </div>
        </a>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link nav-hover page-scroll" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-hover" href="../profil/profil.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-hover page-scroll" href="../index.php#layanan">Layanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-hover page-scroll" href="../index.php#berita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-hover" href="../Hubungi/hubungi.php">Hubungi kami</a>
          </li>
        </ul>
        <a class="btn btn-custom" type="submit" href="../auth/registrasi.php">Daftar</a>
      </div>
    </div>
  </nav>
  <!-- End Of Navbar -->
  <section class="login" id="login">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="contain">
            <div class="elements">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="container">
      <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col">
          <h2 class="text-center title mb-3">Registrasi</h2>
          <!-- card -->
          <div class="card  shadow-sm mx-auto login-card">
            <div class="card-body ">
              <img src="../assets/img/logo-puskesmas.png" class="img-fluid d-flex mt-2 mx-auto align-items-center" alt="" width="12%" />

              <?php if ($success) : ?>
                <div class="alert alert-success my-1" role="alert">
                  Berhasil mendaftar silahkan <a href="login.php">Login</a>
                </div>
              <?php endif; ?>

              <?php if ($dup) : ?>
                <div class="alert alert-danger my-1" role="alert">
                  Email sudah terdaftar
                </div>
              <?php endif; ?>

              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form__div">
                  <input required type="text" name="nama" class="form__input" autocomplete="off" placeholder="" />
                  <label for="InputNama" class="form__label">Nama Lengkap </label>
                </div>
                <div class="form__div">
                  <input required type="text" name="nip" class="form__input" autocomplete="off" placeholder="" />
                  <label for="InputNama" class="form__label">NIP </label>
                </div>
                <div class="form__div">
                  <select name="jabatan" class=" form__input" aria-label="Default select example">
                    <option value="1">Pegawai/Staff</option>
                    <option value="2">Kepala Puskemas</option>
                    <option value="3">Bendahara Puskesmas</option>
                    <option value="4">SuperAdmin</option>
                  </select>
                  <!-- <input required type="text" name="nama" class="form__input" autocomplete="off" placeholder="" /> -->
                  <label for="InputNama" class="form__label">Jabatan </label>
                </div>
                <div class="form__div">
                  <input required type="email" name="email" class="form__input" autocomplete="off" placeholder="" />
                  <label for="InputEmail" class="form__label">Email</label>
                </div>
                <div class="mb-2 form__div">
                  <input required type="password" name="password" class="form__input" />
                  <label for="InputPassword" class="form__label">Kata Sandi</label>
                </div>

                <div class="mt-3 d-flex justify-content-between align-items-center ">
                  <a href="login.php" class="btn btn-link text-decoration-none p-0">Sudah Punya Akun? </a>
                  <input name="submit" type="submit" value="Daftar" class="btn btn-custom float-end"></input>
                </div>
              </form>
            </div>
          </div>
          <!-- endOfCard -->
        </div>
      </div>
    </div>

  </section>
  <!-- </div> -->
  <!-- End Of Header -->



  <!-- Footer -->
  <footer class="pt-5 mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
          <h5 class="text-center">Halaman</h5>
          <ul class="nav flex-column align-items-center">
            <li class="nav-item mb-2"><a href="../index.php" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="../profil/profil.php" class="nav-link p-0 text-muted">Profil</a></li>
            <li class="nav-item mb-2"><a href="../index.php#layanan" class="nav-link p-0 text-muted">Layanan</a></li>
            <li class="nav-item mb-2"><a href="../index.php#berita" class="nav-link p-0 text-muted">Berita</a></li>
            <li class="nav-item mb-2"><a href="../Hubungi/hubungi.php" class="nav-link p-0 text-muted">Hubungi kami</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 mt-sm-3 ">
          <a class="navbar-brand " href="#">
            <div class="digital d-flex  align-items-center mx-sm-auto">
              <img src="../assets/img/logo-puskesmas.png" alt="" width="35" height="auto" class="img-fluid">
              <span class="fs-5 ps-2">UPT PUSKESMAS KENTARA</span>
            </div>
          </a>
          <p class="description">
            UPT. Puskesmas menyediakan informasi dan layanan inventaris yang bisa di akses melalui ponsel dan online
            untuk semua orang.
          </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <form>
            <h5>Newsletter</h5>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Ketik alamat email disini</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Ketik alamat email disini">
              <a class=" btn btn-custom" type="button">Kirim</a>
            </div>
          </form>
        </div>
      </div>
      <div class="divider mt-4 "></div>
      <div class="d-flex justify-content-between pt-4 ">
        <p>&copy; 2021 UPT. Puskesmas Kentara Kab. Dairi.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3">
            <a class="link-dark" href="https://www.youtube.com/channel/UCAD86R4Kc7SVVLMWqbpcfrA">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <polygon points="160 128 112 96 112 160 160 128" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon>
                <path d="M24,128c0,29.75546,3.07414,47.21382,5.41108,56.18664a15.91682,15.91682,0,0,0,9.63282,10.89441C72.52083,207.94575,128,207.5925,128,207.5925s55.47857.35324,88.9558-12.51137a15.91684,15.91684,0,0,0,9.6329-10.89432C228.92572,175.214,232,157.75554,232,128s-3.07415-47.21382-5.41108-56.18664A15.91682,15.91682,0,0,0,216.9561,60.919C183.47917,48.05425,128,48.4075,128,48.4075s-55.47857-.35324-88.9558,12.51137a15.91684,15.91684,0,0,0-9.6329,10.89432C27.07427,80.786,24,98.24446,24,128Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
              </svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="https://www.instagram.com/puskesmaskentara/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <circle cx="128" cy="128" r="40" fill="none" stroke="#000000" stroke-miterlimit="10" stroke-width="16">
                </circle>
                <rect x="36" y="36" width="184" height="184" rx="48" stroke-width="16" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
                <circle cx="180" cy="75.99998" r="12"></circle>
              </svg>
            </a>
          </li>
          <li class="ms-3">
            <a class="link-dark" href="https://www.facebook.com/Puskesmas-Kentara-101173815152436/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000" viewBox="0 0 256 256">
                <rect width="256" height="256" fill="none"></rect>
                <circle cx="128" cy="128" r="96" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></circle>
                <path d="M168,88.00094H152a24,24,0,0,0-24,24v112" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></path>
                <line x1="96" y1="144.00094" x2="160" y2="144.00094" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></line>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- EndOf Footer -->



  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
  <script>
    gsap.from('.card', {
      duration: 1,
      y: 200,
      opacity: 0
    });
  </script>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>


</body>

</html>