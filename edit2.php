<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$tampil = $konek->query("select * from pelanggan where no='$id'");
$a = $tampil->fetch_array();
?>


<link rel="stylesheet" href="style.css">

<div class="container justify-content-center align-items-center d-flex vh-100">
  <div class="col-4">
    <form action="" method="post">
      <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b>Update Pelanggan</b></h3>
      </div>

      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">nama pelanggan</label>
        <input type="text" name="namapelanggan" class="form-control" id="inputnamapelanggan" value="<?php echo $a['namapelanggan'] ?>">
      </div>

      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">meja</label>
        <select name="nomeja" class="form-select" aria-label="Default select example" value="<?php echo $a['nomeja'] ?>">
          <option selected><b>meja 1</b></option>
          <option>meja 2</option>
          <option>meja 3</option>
          <option>meja 4</option>
        </select>
      </div>


      <div class="col-md-12">
        <label for="inputEmail4" class="form-label">pelayan</label>
        <select name="pelayan" class="form-select" aria-label="Default select example" value="<?php echo $a['pelayan'] ?>">
          <option selected><b>Pelayan 1</b></option>
          <option>pelayan 2</option>
          <option>pelayan 3</option>
          <option>pelayan 4</option>
        </select>

      </div>
      <div class="mt-2">
        <button type="submit" class="btn btn-warning" name="update">Simpan</button> <a href="tampil.php?page=11" type="submit" class="btn btn-success" name="update" value="Back">Back</a>
      </div>

    </form>
  </div>


  <?php
  if (isset($_POST['update'])) {
    $update = $konek->query("update pelanggan set namapelanggan='$_POST[namapelanggan]',nomeja='$_POST[nomeja]',pelayan='$_POST[pelayan]' where no='$id'");
  ?>
    <script>
      document.location.href = 'tampil.php?page=11';
    </script>
  <?php
  }
  ?>