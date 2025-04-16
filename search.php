 <?php include "boot.php"; ?>
<div class="card">
  <h5 class="card-header"><i class="bi bi-bar-chart-fill"></i> Data Produk</h5>
  <div class="mt-1 col-3">  
  <form action="search.php" method="post" class="d-flex" role="search">
      <input class="form-control me-" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">cari</button>
    </form>
    </div>
  <div class="card-body">
  <table class="table">
  <thead class="table-dark">
    <tr>
        <th>NO</th>
        <th>Id produk</th>
        <th>Nama Produk</th>
        <th>Gambar</th>
        <th>Harga</th>   
        <th>Stok</th>
        <th>Hapus/Edit</th>    
         
    </tr>
  </thead>
  </div>
</div>

<?php
include "koneksi.php";
include "boot.php";
$cari=$_POST['cari'];
$tampil=$konek->query("select * from produk where namaproduk like '%$cari%'");
$cek=$tampil->num_rows;
if ($cek==""){
 ?>
 <div class="alert alert-secondary" role="alert">
  <div class="text-center text-danger">
<h5><b>Data Tidak Ditemukan !</b></h5>
</div>
</div>
 <?php
}else{
while ($a=$tampil->fetch_array()){
    @$no++;
    ?>


<tbody>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo "$a[idproduk]"; ?></td>
        <td><?php echo "$a[namaproduk]"; ?></td>
        <td><?php echo "$a[gambar]"; ?></td>
        <td><?php echo "$a[harga]"; ?></td>
        <td><?php echo "$a[stok]"; ?></td>

        <td><a href="edit.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-warning" data-toggle="update" data-placement="right" title="update data"><i class="bi bi-pencil-square"></i></button></a>
            

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $a['no'] ?>" data-toggle="Delete" data-placement="right" title="delete data">
            <i class="bi bi-trash"></i></button>
            <div class="modal fade" id="exampleModal<?php echo $a['no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                  <h1 class="modal-title fs-3 py-3" id="exampleModalLabel">Yakin Mau Hapus Data Ini?</h1>
                  </div>
                  <div class="modal-footer">
                  <a href="hapus.php?id=<?php echo $a['no'] ?>"><button type="button" class="btn btn-outline-danger">Oke</button></a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
            </td>
        
<?php
}
    }
?>
</table>