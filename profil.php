<?php
include "boot.php";
?>




<link rel="stylesheet" href="style.css">
<!-- ===================================================================================================================== -->
<!-- nagian form input -->
<blockquote class="blockquote mb-2">
  <div class="alert bg-warning mt-2 text-center" role="alert">
    <h3><b> <i class="fa fa-users"></i> DATA USER</b></h3>
  </div>
  <div class="container md-3 mt-4">


    <div class="card border mb-3 w-100" >
      <div class="card-header bg-primary-subtle"><i class="bi bi-plus-circle-fill"></i> Tambahkan admin</div>
      <div class="card-body">
        <br>
        <form class="row g-3" enctype="multipart/form-data" action="input.php" method="post">
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">username</label>
            <input type="text" name="username" class="form-control" id="inputusername">
          </div>

          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">password</label>
            <input type="text" name="password" class="form-control" id="inputpassword">
          </div>

          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">level</label>
            <input type="text" name="level" class="form-control" id="inputlevel">
          </div>


          <div class="text-end">
            <div class="col-12">
              <button type="submit" name="simpan3" class="btn btn-primary">simpan</button>
              </br>
            </div>
          </div>
        </form>

      </div>
    </div>






    <!-- ============================================================================================================================ -->
    <!-- bagian tabel -->
    <div class="card">
      <h5 class="card-header bg-primary-subtle"><i class="bi bi-bar-chart-fill"></i> Data Profil</h5>
      <div class="mt-1 col-3" style="margin-left:400px">
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>NO</th>
              <th>username</th>
              <th>password</th>
              <th>level</th>
              <th>hapus/edit</th>
            </tr>
          </thead>
      </div>
    </div>




    <!-- ==================================================================================================================== -->
    <!-- koneksi tabel -->
    <?php
    include "koneksi.php";
    @$cari = $_POST['cari'];
    $tampil = $konek->query("select * from aman");
    while ($a = $tampil->fetch_array()) {
      @$no++;
    ?>
      <tbody>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo "$a[username]"; ?></td>
          <td><?php echo "$a[password]"; ?></td>
          <td><?php echo "$a[level]"; ?></td>
      


          <td>
            <a href="edit3.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-warning" data-toggle="update" data-placement="right" title="update data"><i class="bi bi-pencil-square"></i></button></a>

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




        <?php
      }
        ?>

        </table>