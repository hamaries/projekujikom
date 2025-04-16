<?php
include "boot.php";
?>





<link rel="stylesheet" href="style.css">
<!-- ===================================================================================================================== -->
<!-- nagian form input -->
<blockquote class="blockquote mb-2">
    <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b><i class="fa fa-cutlery"></i> PRODUK</b></h3>
    </div>
    <div class="container md-3 mt-4">


        <div class="card border mb-3 w-100" >
            <div class="card-header bg-primary-subtle"><i class="bi bi-plus-circle-fill"></i> Tambahkan Produk</div>
            <div class="card-body">
                <br>
                <form class="row g-3" enctype="multipart/form-data" action="" method="post" autocomplete="off">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">ID PRODUK</label>
                        <input type="text" name="idproduk" class="form-control" id="inputnamaproduk" required>
                    </div>

                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">NAMA PRODUK</label>
                        <input type="text" name="namaproduk" class="form-control" id="inputnamaproduk" required>
                    </div>


                    <div class="col-md-4 ">
                        <label for="inputAddress" class="form-label">GAMBAR </label>
                        <input type="file" name="gambar" class="form-control" id="inputgambar" required>
                    </div>

                    <div class="col-md-4">
                        <label for="inputharga" class="form-label">HARGA</label>
                        <input type="number" min="0" class="form-control" id="inputharga" name="harga" required>
                    </div>


                    <div class="col-4">
                        <label for="inputAddress2" class="form-label">STOK</label>
                        <input type="text" min="0" class="form-control" id="inputstok" name="stok" required>
                    </div>

                    <div class="text-end">
                        <div class="col-12">
                            <button type="submit" name="simpan" class="btn btn-primary">simpan</button>
                            </br>
                        </div>
                    </div>
                </form>

            </div>
        </div>






        <!-- ============================================================================================================================ -->
        <!-- bagian tabel -->
        <div class="card">
            <h5 class="card-header bg-primary-subtle"><i class="bi bi-bar-chart-fill"></i> Data Produk</h5>
            <div class="mt-1 col-3" style="margin-left:850px">
                <form action="" method="post" class="d-flex" role="search">
                    <input class="form-control me-2" type="cari" name="cari" placeholder="cari data"
                        aria-label="Search">
                    <button class="btn btn-success" type="submit">cari</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>Id produk</th>
                            <th>Nama Produk</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>AKSI</th>

                        </tr>
                    </thead>
            </div>
        </div>




        <!-- ==================================================================================================================== -->
        <!-- koneksi tabel -->
        <?php
    include "koneksi.php";
    @$cari = $_POST['cari'];
    $tampil = $konek->query("select * from produk where namaproduk like '%$cari%'");
    while ($a = $tampil->fetch_array()) {
      @$no++;
    ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo "$a[idproduk]"; ?></td>
                <td><?php echo "$a[namaproduk]"; ?></td>
                <td><?php echo "<img src='image/". $a['gambar']."'width=50 height=50>"?></td>
                <td><?php echo "$a[harga]"; ?></td>
                <td><?php echo "$a[stok]"; ?></td>

                <td><a href="edit.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-warning"
                            data-toggle="update" data-placement="right" title="update data"><i
                                class="bi bi-pencil-square"></i></button></a>


                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?php echo $a['no'] ?>" data-toggle="Delete" data-placement="right"
                        title="delete data">
                        <i class="bi bi-trash"></i></button>
                    <div class="modal fade" id="exampleModal<?php echo $a['no'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body text-center "><i
                                        class="bi bi-exclamation-circle fs-1 text-danger"></i>
                                    <h1 class="modal-title fs-3 py-3" id="exampleModalLabel">Yakin Mau Hapus Data Ini?
                                    </h1>
                                </div>
                                <div class="modal-footer">
                                    <a href="hapus.php?id=<?php echo $a['no'] ?>"><button type="button"
                                            class="btn btn-primary">Oke</button></a>
                                    <button type="button" class="btn btn-success"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <?php
      }
        ?>
                </table>




                <!-- ====================================================================================================================== -->
                <!-- bagian koneksi -->
                <?php
        $konek = new mysqli("localhost", "root", "", "kasir") or die('error');
        if (isset($_POST['simpan'])) {
          $nama = $_FILES['gambar']['name'];
          $file = $_FILES['gambar']['tmp_name'];
          // move_uploaded_file($file, "gambar/$nama");
          move_uploaded_file($file, "image/$nama");
          $input=$konek->query("insert into produk(idproduk,namaproduk,gambar,harga,stok) values ('$_POST[idproduk]','$_POST[namaproduk]','$nama','$_POST[harga]','$_POST[stok]')");
          if($input){
            echo"berhasil ditambahkan";
          }
        }
        $tampil = $konek->query("select * from produk");
        while ($a = $tampil->fetch_array()) {
        }
        ?>











                <iframe src="" name="menu" frameborder="0" width="100" height="100"></iframe>