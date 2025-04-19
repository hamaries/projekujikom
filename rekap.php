<?php
include "boot.php"; // Pastikan file ini punya <html>, <body>, dan sidebar
?>

<div class="container-fluid">
    <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b><i class="bi bi-book-fill"></i> REKAP</b></h3>
    </div>

    <!-- Form Pencarian -->
    <form action="rekap.php" method="get">
        <div class="input-group shadow mb-3">
            <input type="date" name="awal" class="form-control" aria-label="Tanggal Awal" required>
            <input type="date" name="akhir" class="form-control" aria-label="Tanggal Akhir" required>
            <span class="input-group-text">
                <button class="btn btn-success" type="submit" title="Cari"><i class="bi bi-search"></i></button>
                <button class="btn btn-primary mx-2" onclick="printDiv('print')" type="button" title="Print"><i class="bi bi-printer-fill"></i></button>
            </span>
        </div>
    </form>

    <!-- Tombol Kembali -->
    <div class="mb-3">
        <a href="tampil.php?page=6" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Hasil Rekap -->
    <fieldset id="print">
        <table class="table table-bordered border-dark">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>pelayan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>No Meja</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                @$awal = $_GET['awal'];
                @$akhir = $_GET['akhir'];
                $no = 1;

                if (!empty($awal) && !empty($akhir)) {
                    $query = "SELECT * FROM transaksi WHERE tanggal BETWEEN '$awal' AND '$akhir'";
                } else {
                    $query = "SELECT * FROM transaksi";
                }

                $tampil = $konek->query($query);
                while ($t = $tampil->fetch_array()) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$t['tanggal']}</td>
                        <td>{$t['kasir']}</td>
                        <td>{$t['namapelanggan']}</td>
                        <td>{$t['namaproduk']}</td>
                        <td>{$t['meja']}</td>
                        <td>{$t['harga']}</td>
                        <td>{$t['jumlah']}</td>
                        <td>{$t['total']}</td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </fieldset>
</div>

<!-- Script Print -->
<script>
    function printDiv(el) {
        const printContents = document.getElementById(el).innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // reload biar layout balik
    }
</script>

</body>
</html>
