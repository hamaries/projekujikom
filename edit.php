<?php
include "koneksi.php";
include "boot.php";
$id = $_GET['id'];
$tampil = $konek->query("SELECT * FROM produk WHERE no='$id'");
$a = $tampil->fetch_array();
?>

<link rel="stylesheet" href="style.css">

<div class="container justify-content-center align-items-center vh-100 d-flex">
  <div class="col-4">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b>Update Produk</b></h3>
      </div>

      <!-- Form Input ID Produk -->
      <div class="mb-3">
        <label for="idproduk" class="form-label">Id Produk</label>
        <input type="text" class="form-control" id="idproduk" name="idproduk" value="<?php echo $a['idproduk']; ?>" reaquired>
      </div>

      <!-- Form Input Nama Produk -->
      <div class="mb-3">
        <label for="namaproduk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?php echo $a['namaproduk']; ?>" required>
      </div>

      <!-- Form Input Harga -->
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $a['harga']; ?>" required>
      </div>

      <!-- Form Input Stok -->
      <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $a['stok']; ?>" required>
      </div>

      <!-- Form Input Gambar (jika gambar ada, tampilkan gambar lama) -->
      <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
        <?php if ($a['gambar']): ?>
          <p><img src="images/<?php echo $a['gambar']; ?>" alt="Gambar Produk" width="100px"></p>
        <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-warning" name="update">Simpan</button>
      <a href="tampil.php?page=4" class="btn btn-success">Back</a>
    </form>
  </div>

  <?php
  if (isset($_POST['update'])) {
    $idproduk = $_POST['idproduk'];
    $namaproduk = $_POST['namaproduk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Handle Gambar Upload
    $gambar = $a['gambar']; // Set gambar lama sebagai default
    if ($_FILES['gambar']['name']) {
      // Jika ada gambar baru
      $gambar = $_FILES['gambar']['name'];
      $target_dir = "images/";
      $target_file = $target_dir . basename($gambar);
      move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file); // Pindahkan gambar ke folder
    }

    // Update data produk
    $update = $konek->query("UPDATE produk SET idproduk='$idproduk', namaproduk='$namaproduk', gambar='$gambar', harga='$harga', stok='$stok' WHERE no='$id'");

    if ($update) {
      echo "<script>document.location.href = 'tampil.php?page=4';</script>";
    } else {
      echo "<script>alert('Update gagal.');</script>";
    }
  }
  ?>
</div>
