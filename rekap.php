<?php
include "boot.php";
?>



<div class="alert bg-light mt-2 text-center" role="alert">
        <h3><b><i class="bi bi-book-fill"></i> REKAP</b></h3>
    </div>


    <!-- header -->
   
<form action="rekap.php"method="get" >
<div class="input-group shadow" target="tampil.php?page=6" >
  <input type="date" aria-label="First name" name="awal" class="form-control">
  <input type="date" aria-label="Last name" name="akhir" class="form-control">
  <span class="input-group-text"><button class="btn btn-success " type="submit" data-toggle="search" data-placement="right" title="search"><i class="bi bi-search"></i></button>
  <button class="btn btn-primary mx-2" onclick="printDiv('print')" type="submit" data-toggle="print" data-placement="right" title="print"><i class="bi bi-printer-fill"></i></button>
</span>
</div>
</form>

    <fieldset id="print">
        <div class="mt-3">
        <table class="table  table-bordered border-dark">
            <thead class="table-primary">
                <tr>
                    <th scope="col">
                        <h6><b>No</b></h6>
                    </th>

                    <th scope="col">
                        <h6><b>Tanggal</b></h6>
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
                    
                </tr>
            </thead>
            </thead>
            </div>

            <!-- koneksi rekap -->

            <?php include "koneksi.php";
      @$cari = $_GET['awal'];
      if ($cari =="") {

        $tampil = $konek->query("select * from transaksi");
        while ($t = $tampil->fetch_array()) {
          @$no++;
      ?>

            <tbody class="table">
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $t['tanggal']; ?></td>
                    <td><?php echo $t['kasir']; ?></td>
                    <td><?php echo $t['namapelanggan']; ?></td>
                    <td><?php echo $t['namaproduk']; ?></td>
                    <td><?php echo $t['meja']; ?></td>
                    <td><?php echo $t['harga']; ?></td>
                    <td><?php echo $t['jumlah']; ?></td>
                    <td><?php echo $t['total']; ?></td>
                    


                    <?php
          }
        } else {
          $tampil = $konek->query("select * from transaksi where tanggal  between '$_GET[awal]' and '$_GET[akhir]'");
          while ($t = $tampil->fetch_array()) {
            @$no++;
            ?>
            <tbody class="table">
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $t['tanggal']; ?></td>
                    <td><?php echo $t['kasir']; ?></td>
                    <td><?php echo $t['namapelanggan']; ?></td>
                    <td><?php echo $t['namaproduk']; ?></td>
                    <td><?php echo $t['meja']; ?></td>
                    <td><?php echo $t['harga']; ?></td>
                    <td><?php echo $t['jumlah']; ?></td>
                    <td><?php echo $t['total']; ?></td>
                    


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