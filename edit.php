<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$tampil = $konek->query("select * from produk where no='$id'");
$a = $tampil->fetch_array();
?>


<link rel="stylesheet" href="style.css">

<div class="container justify-content-center align-items-center vh-100 d-flex">

  <div class="col-4">
    <form action="" method="post">
      <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b>Update Produk</b></h3>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Id Produk</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idproduk" value="<?php echo $a['idproduk'] ?>">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nama Produk</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="namaproduk" value="<?php echo $a['namaproduk'] ?>">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Harga</label>
          <input type="number" class="form-control" id="exampleInputPassword1" name="harga" value="<?php echo $a['harga'] ?>">
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Stok</label>
          <input type="number" class="form-control" id="exampleInputPassword1" name="stok" value="<?php echo $a['stok'] ?>">
        </div>

        <button type="submit" class="btn btn-warning" name="update">Simpan</button> <a href="tampil.php?page=4" type="submit" class="btn btn-success" name="update" value="Back">Back</a>
    </form>
  </div>


  <?php
  if (isset($_POST['update'])) {
    $update = $konek->query("update produk set idproduk='$_POST[idproduk]',namaproduk='$_POST[namaproduk]',gambar='$_POST[gambar]',harga='$_POST[harga]',stok='$_POST[stok]' where no='$id'");

  ?>
    <script>
      document.location.href = 'tampil.php?page=4';
    </script>
  <?php
  }
  ?>
</div>