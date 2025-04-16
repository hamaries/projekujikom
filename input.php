<?php
include "koneksi.php"
?>

<?php
if(isset($_POST['simpan1'])){
    $idproduk =$_POST['idproduk'];
    $namaproduk =$_POST['namaproduk'];
    $gambar =$_POST['gambar'];
    $harga =$_POST['harga'];
    $stok =$_POST['stok'];

    $insert = mysqli_query($konek,"insert into produk (idproduk,namaproduk,gambar,harga,stok) values('$idproduk','$namaproduk','$gambar','$harga','$stok')");

    if($insert){
        header('location:tampil.php?page=4');
    } else{
        // echo'
        // <script>alert("gagal menambahkan pelanggan baru");
        // window.location.href= "input_pelanggan.php"
        // </script>';
    }
}
?>




<?php
if(isset($_POST['simpan2'])){
    $namapelanggan =$_POST['namapelanggan'];
    $nomeja =$_POST['nomeja'];
    $pelayan =$_POST['pelayan'];
    

    $insert = mysqli_query($konek,"insert into pelanggan (namapelanggan,nomeja,pelayan) values('$namapelanggan','$nomeja','$pelayan')");

    if($insert){
        header('location:tampil.php?page=11');
    // } else{
        // echo'
        // <script>alert("gagal menambahkan pelanggan baru");
        // window.location.href= "input_pelanggan.php"
        // </script>';
    }
}
?>



<?php
if(isset($_POST['simpan3'])){
    $username =$_POST['username'];
    $password =$_POST['password'];
    $level =$_POST['level'];
    

    $insert = mysqli_query($konek,"insert into aman (username,password,level) values('$username','$password','$level')");

    if($insert){
        header('location:tampil.php?page=8');
    } else{
        // echo'
        // <script>alert("gagal menambahkan pelanggan baru");
        // window.location.href= "input_pelanggan.php"
        // </script>';
    }
}
?>
