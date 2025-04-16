<?php
include "boot.php";
?>

<form enctype="multipart/form-data" action="" method="post" target="menu">
</form>
<link rel="stylesheet" href="style.css">
<!-- ===================================================================================================================== -->
<!-- nagian form input -->
<blockquote class="blockquote mb-2">
  <div class="alert bg-warning mt-2 text-center" role="alert">
    <h3><b> <i class="fa fa-users"></i> PELANGGAN</b></h3>
  </div>
  <div class="container md-3 mt-4">


    <div class="card border mb-3 w-100">
      <div class="card-header bg-info"><i class="bi bi-plus-circle-fill"></i> Tambahkan Produk</div>
      <div class="card-body">
        <br>
        <form class="row g-3" enctype="multipart/form-data" action="input.php" method="post">
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">nama pelanggan</label>
            <input type="text" name="namapelanggan" class="form-control" id="inputnamaproduk">
          </div>

          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">meja</label>
            <select name="nomeja" class="form-select" aria-label="Default select example">
              <option selected><b>meja 1</b></option>
              <option>meja 2</option>
              <option>meja 3</option>
              <option>meja 4</option>
            </select>
          </div>


          <div class="col-md-4 ">
            <label for="inputEmail4" class="form-label">pelayan</label>
            <select name="pelayan" class="form-select" aria-label="Default select example">
              <option selected><b>Pelayan 1</b></option>
              <option>pelayan 2</option>
              <option>pelayan 3</option>
              <option>pelayan 4</option>
            </select>

          </div>


          <div class="text-end">
            <div class="col-12">
              <button type="submit" name="simpan2" class="btn btn-primary">simpan</button>
              </br>
            </div>
          </div>
        </form>

      </div>
    </div>






    <!-- ============================================================================================================================ -->
    <!-- bagian tabel -->
    <div class="card">
      <h5 class="card-header bg-info"><i class="bi bi-bar-chart-fill"></i> Data Produk</h5>
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>NO</th>
              <th>nama pelanggan</th>
              <th>tanggal & waktu</th>
              <th>no meja</th>
              <th>Pelayan</th>
              <th>aksi</th>
              <th>bayar</th>
            </tr>
          </thead>
      </div>
    </div>




    <!-- ==================================================================================================================== -->
    <!-- koneksi tabel -->
    <?php
    include "koneksi.php";
    @$cari = $_POST['cari'];
    $tampil = $konek->query("select * from pelanggan");
    while ($a = $tampil->fetch_array()) {
      @$no++;
    ?>
      <tbody>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo "$a[namapelanggan]"; ?></td>
          <td><?php echo "$a[tanggal]"; ?></td>
          <td><?php echo "$a[nomeja]"; ?></td>
          <td><?php echo "$a[pelayan]"; ?></td>


          <td>
            <a href="edit2.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-warning" data-toggle="update" data-placement="right" title="update data"><i class="bi bi-pencil-square"></i></button></a>

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a['no'] ?>" data-toggle="Delete" data-placement="right" title="delete data">
              <i class="bi bi-trash"></i></button>
            <div class="modal fade" id="exampleModal<?php echo $a['no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center"><i class="bi bi-exclamation-circle fs-1 text-danger"></i>
                    <h1 class="modal-title fs-3 py-3" id="exampleModalLabel">Yakin Mau Hapus Data Ini?
                    </h1>
                  </div>
                  <div class="modal-footer">
                    <a href="hapus1.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-primary">Oke</button></a>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </td>

          <td>
            <a href="tampil.php?page=7&id=<?= $a['no'] ?>" class="btn btn-primary">beli</a>
          </td>



        <?php
      }
        ?>

        </table>