<?php
include "boot.php";
include "koneksi.php";
include "rupiah.php";


// $t = time();
// echo ($t . "<br>");
$date = date('Y-m-d');
// $total_bayar = mysqli_query($konek, "SELECT SUM(total) AS totbar FROM transaksi WHERE tanggal = '$date' ");
// $totall = mysqli_fetch_assoc($total_bayar);
$jumlaproduk = mysqli_query($konek, "SELECT COUNT(*) AS makanan FROM produk ");
$makanan = mysqli_fetch_assoc($jumlaproduk);
$jumlapelanggan = mysqli_query($konek, "SELECT COUNT(*) AS costumer FROM pelanggan ");
$costumer = mysqli_fetch_assoc($jumlapelanggan);
$jumlaadmin = mysqli_query($konek, "SELECT COUNT(*) AS pengguna FROM aman ");
$pengguna = mysqli_fetch_assoc($jumlaadmin);
$total_pendapatan = mysqli_query($konek, "SELECT SUM(total) AS totalall FROM transaksi ");
$total_all = mysqli_fetch_assoc($total_pendapatan);


?>
<body style="background-image: url(image/resto.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;">
    

<div class="alert bg-warning mt-2 text-center m-2" role="alert" data-aos="fade-down" data-aos-duration="1000">
    <h3><b><i class="bi bi-speedometer"></i> DASHBOARD</b></h3>
</div>

<div id="layoutSidenav_content">
    <div class="row m-3">

        <div class="col-6" data-aos="fade-right" data-aos-duration="1000">
            <div class="alert bg-success mt-2 text-center text-light" role="alert">
                <h5><b><i class="bi bi-calendar2-range-fill"></i> TANGGAL:</b></h5>
                <h3><b> <?= $date; ?></b></h3>
            </div>
        </div>

        <div class="col-6" data-aos="fade-left" data-aos-duration="1000">
            <div class="alert bg-success mt-2 text-center text-light" role="alert">
                <h5><b><i class="bi bi-alarm-fill"></i> JAM:</b></h5>
                <h3><b>
                        <!-- <?php
                                date_default_timezone_set("Asia/jakarta");
                                ?> -->
                        <span id="jam" style="font-size:24"></span>
                    </b></p>

                    <script type="text/javascript">
                        window.onload = function() {
                            jam();
                        }

                        function jam() {
                            var e = document.getElementById('jam'),
                                d = new Date(),
                                h, m, s;
                            h = d.getHours();
                            m = set(d.getMinutes());
                            s = set(d.getSeconds());

                            e.innerHTML = h + ':' + m + ':' + s;

                            setTimeout('jam()', 1000);
                        }

                        function set(e) {
                            e = e < 10 ? '0' + e : e;
                            return e;
                        }
                    </script>
                    </b>
                </h3>
            </div>
        </div>

        <div class="col-md-3" data-aos="flip-down" data-aos-duration="1000">
            <div class="card bg-warning mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fa fa-cutlery p-3 mt-1 fa-3x"></i>
                    </div>
                    <div class="col-md-10" >
                        <div class="ml-5 card-body">
                            <h6 class="card-title">Total Produk : </h6>
                            <span class="btn btn-success text-white btn-sm text-small"><?= $makanan['makanan'] ?>
                                Produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3" data-aos="flip-down" data-aos-duration="1000">
            <div class="card bg-danger mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <i class="fa fa-users p-3 mt-2 fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <div class="ml-3 card-body">
                            <h6 class="card-title text-light">Total Pelanggan :</h6>
                            <span class="btn btn-success text-white btn-sm text-small"><?= $costumer['costumer'] ?>
                                Pelanggan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3" data-aos="flip-down" data-aos-duration="1000">
            <div class="card bg-info mb-3">
                <div class="row">
                    <div class="col-md-2">
                        <i class=" fa-solid fa-user-tie p-3 mt-3 fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <div class="ml-4 card-body">
                            <h6 class="card-title"> Jumlah Admin : </h6>
                            <span class="btn btn-success btn-sm text-small"><?= $pengguna['pengguna'] ?> admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3" data-aos="flip-down" data-aos-duration="1000">
            <div class="card bg-secondary mb-3">
                <div class="row">
                    <div class="col-md-2">
                    <i class="fa fa-solid fa-dollar-sign p-3 mt-2 fa-2x"></i>
                    </div>
                    <div class="col-md-10">
                        <div class="ml-4 card-body">
                            <h6 class="card-title text-light">Pendapatan/bulan:</h6>

                            <a href="">
                                <span class="btn btn-danger btn-sm text-small">Rp.<?= rupiah($total_all['totalall']) ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>