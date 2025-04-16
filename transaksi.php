<?php

include "boot.php";
include "koneksi.php";
$id = $_GET['id'];
$pelanggan = $konek->query("select * from pelanggan where no='$id'");
$p = $pelanggan->fetch_array();
?>




<div class="alert bg-warning mt-2 text-center" role="alert">
  <h3><b><i class="bi bi-cart4"></i> KERANJANG PENJUALAN</b></h3>
</div>
<a href="tampil.php?page=11"   type="submit" class="btn btn-success" name="update" value="Back"><i class="bi bi-arrow-return-left"></i>Back</a>

<div class="row">
  <div class="col col-5 mt-2">
    <ul class="list-group">
      <li class="list-group-item  bg-dark text-center text-light" aria-current="true">Form Input</li>
      <form action="" method="post">



        <div class="mb-3">

          <label for="disabledSelect" class="form-label">Pilih Menu</label>
          <select id="disabledSelect" class="form-select" name="opsi">

            <?php
            include "koneksi.php";
            $menu = $konek->query("select*from produk");
            // $s=$menu->fetch_array();
            while ($c = $menu->fetch_array()) {


              echo " <option>$c[namaproduk] </option> ";
            ?>

            <?php
            }
            ?>


          </select>

          <?php


          @$menu2 = $konek->query("select*from produk where namaproduk like '$_POST[opsi]' ");
          $s2 = $menu2->fetch_array();

          ?>

          <button type="submit" class="btn btn-dark float-end mt-5" name="cek">input</button>
      </form>
      <br><br><br><br>


      <p class="text-danger">WARNING: input terlebih dahulu sebelum klik button bayar <i></i></p>
  </div>
</div>

<div class="col col-3">
  <form action="" method="post" id="finput">

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label mt-3">Nama Pelanggan</label>
      <input type="text" class="form-control mt-3" id="exampleInputPassword1" name="namapelanggan" value="<?= $p['namapelanggan'] ?>">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">No Meja</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="meja" value="<?= $p['nomeja'] ?>">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">pelayan</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="kasir" value="<?= $p['pelayan'] ?>">
    </div>

</div>
<div class="col col-3 mt-4">
  <div class="mb-3 mt-2">
    <label for="exampleInputPassword1" class="form-label">Nama Menu</label>
    <input type="text" class="form-control" name="menu" value="<?php echo @$s2['namaproduk'] ?>" required readonly>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">harga</label>
    <input type="text" class="form-control" name="harga" value="<?php echo @$s2['harga'] ?>" required readonly>
  </div>
  <input type="hidden" class="form-control" name="gambar" required>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Banyak</label>
    <input type="number" class="form-control" name="banyak" min="1" required>
  </div>
  <button type="submit" class="btn btn-dark float-end mt-5" name="simpan">Bayar</button>
  </form>
</div>
</div>

<!-- input -->
<?php
@$tombol = $_POST['simpan'];
if (isset($tombol)) {
  include "koneksi.php";
  $harga = $_POST['harga'];
  $banyak = $_POST['banyak'];
  @$total = $harga * $banyak;

  $input = $konek->query("INSERT INTO transaksi (kasir,namapelanggan,namaproduk,meja,harga,jumlah,total) values ('$_POST[kasir]','$_POST[namapelanggan]', '$_POST[menu]','$_POST[meja]', '$harga','$banyak', '$total')");

?>
  <script>
    $(".finput")[0].reset();
  </script>
<?php
}
?>
<!-- tutup input -->

<?php
include "koneksi.php";
@$pelanggan = $_POST['namapelanggan'];

$hitung = $konek->query("select SUM(total) as total from transaksi where namapelanggan like '$pelanggan'");
$b = $hitung->fetch_array();
echo "<i class='fs-1 text-end'>Rp." . number_format($b['total']) . "</i>";
?>



<div class="mt-2">
  <div class="card">
    <div class="card-header">
      <b class="d-flex justify-content-between align-items-center">
        <h5><i class="bi bi-cart"></i> Kasir</h5>
        <!-- <a href="#" onclick="window.print()" class="btn btn-warning mb-3">
        <i class="bi bi-printer"></i> Cetak -->
        </a>
      </b>
    </div>
    <div class="card-body">
      <div class="col-sm-5">
        <?php
        $date = date('d-m-Y');
        ?>
        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
        <input type="text" value="<?= $date; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
      </div>
      <div class="container text-center">
        <div class="mt-3 col-12">
          <blockquote class="blockquote mb-5">
            <table class="table table-bordered border-primary mt-2">
              <thead class="table-info ">
                <tr>
                  <th>No</th>
                  <th>Nama Menu</th>
                  <th>Nama Costumer</th>
                  <th>Meja</th>
                  <th>Di layani</th>
                  <th>Harga</th>
                  <th>Banyak</th>
                  <th>Total</th>
                
                </tr>
              </thead>




              <?php
              include "koneksi.php";

              $tampil = $konek->query("select * from transaksi where namapelanggan like '$pelanggan'");
              while ($a = $tampil->fetch_array()) {
                @$no++;
              ?>
                <tr>
                  <!-- <td>  <img src="image/<?php echo $a['gambar'] ?>" class="img-fluid d-grid" alt="" width="50" height="50"></td> -->
                  <td><?php echo $no; ?></td>
                  <td><?php echo $a['namaproduk'] ?></td>
                  <td><?php echo $a['namapelanggan'] ?></td>
                  <td><?php echo $a['meja'] ?></td>
                  <td><?php echo $a['kasir'] ?></td>
                  <td><?php echo "Rp." . number_format($a['harga']) ?></td>
                  <td><?php echo $a['jumlah'] ?></td>
                  <td><?php echo "Rp." . number_format($a['total']) ?></td>

                <?php
              }
                ?>
            </table>
        </div>
      </div>