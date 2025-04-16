<?php
include "boot.php";
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
?>


<!-- bagian dashboard -->



<link rel="stylesheet" href="style.css">

<body>

  <div class="row">
    <div class="col bg-warning-subtle p-3 col-2" style="height: 100vh;">
      <ul class="nav flex-column">
        <h3><b> KASIR <h5> RUMAH MAKAN</h5>
            <hr color="black">
          </b></h3>






        <div class="mt-2">
          <li class=" nav-item ">
            <div class="sb-sidenav-menu-heading">Core</div>
            <div class="sb-nav-link-icon"></div>
            <a href="tampil.php?page=1" class="nav-link active text-dark" aria-current="page" href="#item-home"><i class="fa fa-solid fa-gauge"></i><b> Dashboard</b></a>
          </li>
        </div>


        <div class="sb-sidenav-menu-heading">Interface</div>
        <div class="mt-3">
          <li class="nav-hover nav-item ">
            <div class="sb-nav-link-icon"></i></div>
            <a href="tampil.php?page=3" class="nav-link active text-dark" aria-current="page" href="#item-home"><i class="fa fa-cutlery "></i><b> Menu</b></a>
          </li>
          <li class="nav-item">
            <a href="tampil.php?page=4" class="nav-link text-dark" href="#services"> <i class="bi bi-menu-button-wide-fill"></i><b> Data produk</b></a>
          </li>

          <li class="nav-item">
            <a href="tampil.php?page=11" class="nav-link text-dark" href="#"><i class="bi bi-people-fill"></i><b> Pelanggan</b></a>
          </li>

          <li class="nav-item">
            <a href="tampil.php?page=8" class="nav-link text-dark" href="#"><i class=" fa-solid fa-user-tie"></i><b> Data User</b></a>
          </li>

          <li class="nav-item">
    <a href="tampil.php?page=6" class="nav-link text-dark" href="#"><i class="fa fa-solid fa-book-open"></i><b> Rekap</b></a>
  </li>




          <li class="nav-item">
            <a href="logout.php" target="konten" class="nav-link active text-dark" href="#"><i class="bi bi-door-open-fill"></i><b> Log Out</b></a>
        </div>
        </li>
      </ul>
    </div>
</body>



<div class="col">


  <?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = '1';
  }
  switch ($page) {
    case '1';
      require('dashboard.php');
      break;
    case '3';
      require('menu.php');
      break;

    case '4';
      require('input_menu.php');
      break;

    case '5';
      require('input_transaksi.php');
      break;

    case '6';
    require('rekap.php');
    break;

    case '7';
      require('transaksi.php');
      break;

    case '8';
      require('profil.php');
      break;

    case '11';
      require('input_pel.php');
      break;
  }
  ?>
</div>

</div>