<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$tampil = $konek->query("select * from aman where no='$id'");
$a = $tampil->fetch_array();
?>


<link rel="stylesheet" href="style.css">

<div class="container justify-content-center align-items-center d-flex vh-100">
  <div class="col-4">
    <form action="" method="post">
      <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b>UPDATE ADMIN</b></h3>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">usernmae</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?php echo $a['username'] ?>">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">password</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $a['password'] ?>">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">level</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="level" value="<?php echo $a['level'] ?>">
        </div>
        <button type="submit" class="btn btn-warning" name="update">Simpan</button> <a href="tampil.php?page=8" type="submit" class="btn btn-success" name="update" value="Back">Back</a>
    </form>
  </div>


  <?php
  if (isset($_POST['update'])) {
    $update = $konek->query("update produk set idproduk='$_POST[idproduk]',namaproduk='$_POST[namaproduk]',gambar='$_POST[gambar]',harga='$_POST[harga]',stok='$_POST[stok]' where no='$id'");

  ?>
    <script>
      document.location.href = 'tampil.php?page=8';
    </script>
  <?php
  }
  ?>