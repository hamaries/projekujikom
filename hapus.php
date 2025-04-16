<?php
include "koneksi.php";
$id=$_GET['id'];
$delete=$konek->query("delete from produk where no='$id'");
?>
<script>
    document.location.href='tampil.php?page=4';
</script>