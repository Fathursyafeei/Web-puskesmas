<?php
include_once('../../../lib/connection.php');



if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $gol = $_POST['gol'];
  $jabatan = $_POST['jabatan'];
  $img = $_FILES['img']['name'];

  if ($img != "") {
    $extension_accepted = ['png', 'jpg', 'svg'];
    $x = explode('.', $img);
    $extension = strtolower(end($x));
    $file_tmp = $_FILES['img']['tmp_name'];
    $rand = rand(1, 999);
    $new_name = $rand . '-' . $img;

    if (in_array($extension, $extension_accepted)) {
      move_uploaded_file($file_tmp, '../../assets/img/public-image/' . $new_name);
      $query = "INSERT INTO staffs(nama,nip,gol,jabatan,img) VALUES(
          '$nama','$nip','$gol','$jabatan','$new_name'
        )";
      $result = mysqli_query($connection, $query);
      if (!$result) {
        die("The query failed  : " . mysqli_errno($connection) .
          " - " . mysqli_error($connection));
      } else {
        echo "<script>alert('Berhasil menambahkan data.');window.location='../create-staff.php';</script>";
      }
    } else {
      echo "<script>alert('Extensions tidak diizinkan.');window.location='../create-staff.php';</script>";
    }
  } else {
    $query = "INSERT INTO staffs(nama,nip,gol,jabatan) VALUES(
        '$nama','$nip','$gol','$jabatan'
      )";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("The query failed : " . mysqli_errno($connection) .
        " - " . mysqli_error($connection));
    } else {
      echo "<script>alert('Berhasil menambahkan data.');window.location='../create-staff.php';</script>";
    }
  }
} else {
  echo "Error, Tombol belum di tekan!";
}
