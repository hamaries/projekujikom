<?php
include "koneksi.php";
$id=$_GET['id'];
echo $id;
$delete=$konek->query("delete from pelanggan where no='$id'");
?>
<script>
    document.location.href='tampil.php?page=11';
</script>