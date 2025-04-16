<?php
include "boot.php";
?>



    <!-- header -->
    <div class="alert bg-warning mt-2 text-center" role="alert">
        <h3><b><i class="fa-solid fa-layer-group"></i> REKAP</b></h3>
    </div>
    <div class="text-center">
        <div class="col-7 ">
            <form action="tampil.php?page=6" method="get">
                <div class="input-group">
                    <input type="date" aria-label="First name" name="awal" class="form-control">
                    <input type="date" aria-label="Last name" name="akhir" class="form-control">
                    <span class="input-group-text"><button type="submit" name="cari"><i class="bi bi-search"></i></button></span>

                    <div class="col col-4 text-end">
                        <i class="btn btn-success" style="margin-left:600px; " onclick="printDiv('print')"
                            type="submit"><i class="bi bi-printer-fill"></i></i>
                    </div>
            </form>
        </div>
    </div>

    <fieldset id="print">
        <table class="table  table-bordered border-dark">
            <thead class="table-primary">
                <tr>
                    <th scope="col">
                        <h6><b>No</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Kasir</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Nama Pelanggan</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Nama Barang</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>No Meja</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Harga</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Jumlah</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Total</b></h6>
                    </th>
                    <th scope="col">
                        <h6><b>Tanggal</b></h6>
                    </th>
                </tr>
            </thead>
            </thead>


            <!-- koneksi rekap -->

            <?php include "koneksi.php";
      @$cari = $_POST['awal'];
      if ($cari =="") {

        $tampil = $konek->query("select * from transaksi");
        while ($t = $tampil->fetch_array()) {
          @$no++;
      ?>

            <tbody class="table">
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $t['kasir']; ?></td>
                    <td><?php echo $t['namapelanggan']; ?></td>
                    <td><?php echo $t['namaproduk']; ?></td>
                    <td><?php echo $t['meja']; ?></td>
                    <td><?php echo $t['harga']; ?></td>
                    <td><?php echo $t['jumlah']; ?></td>
                    <td><?php echo $t['total']; ?></td>
                    <td><?php echo $t['tanggal']; ?></td>


                    <?php
          }
        } else {
          $tampil = $konek->query("select * from transaksi where tanggal '%$cari%' between '$_POST[awal]' and '$_POST[akhir]'");
          while ($t = $tampil->fetch_array()) {
            @$no++;
            ?>
            <tbody class="table">
                <tr>
                    <td><?php echo $t['kasir']; ?></td>
                    <td><?php echo $t['namapelanggan']; ?></td>
                    <td><?php echo $t['namaproduk']; ?></td>
                    <td><?php echo $t['meja']; ?></td>
                    <td><?php echo $t['harga']; ?></td>
                    <td><?php echo $t['jumlah']; ?></td>
                    <td><?php echo $t['total']; ?></td>
                    <td><?php echo $t['tanggal']; ?></td>


                    <?php
          }
        }
          ?>
                </tr>
            </tbody>
            </tbody>
        </table>
    </fieldset>
    <script type="text/javascript">
    function printDiv(el) {
        var a = document.body.innerHTML;
        var b = document.getElementById(el).innerHTML;

        document.body.innerHTML = b;
        window.print();
        document.body.innerHTML = a;

    }
    </script>

</body>