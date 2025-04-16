<?php include "boot.php"
?>

<div class="alert bg-warning mt-2 text-center" role="alert">
  <h3><b><i class="bi bi-list"></i> MENU</b></h3>
</div>


<body style="background-image: url(image/3398.jpg); background-repeat: no-repeat; background-size: cover;">
<div class="row">
<?php
      include "koneksi.php";
$tampil=$konek->query("select * from produk");
while ($a=$tampil-> fetch_array()){
  ?>
  <div class="col-sm-3 mb-2 mb-sm-0 mt-3">
    <div class="card">
      <div class="card-body">
      
<?php
    echo "<img src='image/". $a['gambar']."'width='100%' height='200' >";

?>
<b>
<div class="text-center">
<label for=""><?php echo $a['namaproduk']; ?>
</label></div>
        <p><?php echo $a['idproduk']; ?></p>
        <h7 class="card-title">Harga : Rp. <?php echo $a['harga']; ?></h7>
        <p class="card-text">stok : <?php echo $a['stok']; ?></p>
        <div class="text-end">
          
</b>
        </div>
      </div>
    </div>
  </div>

</body>
  <?php
}
?>
