<?php
include_once("../../lib/connection.php");

if (!isset($_GET['id'])) {
  header("Location:./list-staff.php");
}

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM staffs WHERE id='$id'");
$staff = mysqli_fetch_array($query);
?>


<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

    </div>
    <div class="modal-body">
      <div class="row justify-content-center align-items-center flex-column">
        <img src="../assets/img/public-image/<?= $staff['img'] ?>" alt="staff img" class="img-fluid" width="80rem" style="border-radius:20px">
        <div class="wrapper" style="width: 85%;">
          <div class="form-group">
            <label>Nama :</label>
            <input type="text" class="form-control" autocomplete="off" readonly placeholder="<?= $staff['nama'] ?>">
          </div>
          <div class="form-group">
            <label>NIP :</label>
            <input type="text" class="form-control" autocomplete="off" readonly placeholder="<?= $staff['nip'] ?>">
          </div>
          <div class="form-group">
            <label>Golongan :</label>
            <input type="text" class="form-control" autocomplete="off" readonly placeholder="<?= $staff['gol'] ?>">
          </div>
          <div class="form-group">
            <label>Jabatan :</label>
            <input type="text" class="form-control" autocomplete="off" readonly placeholder="<?= $staff['jabatan'] ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button data-dismiss="modal" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Ok</button>
    </div>
  </div>

</div>
</div>