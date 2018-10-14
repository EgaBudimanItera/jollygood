<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Jolly Good English</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?=base_url()?>assetsfront/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>assetsfront/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="<?=base_url()?>assetsfront/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?=base_url()?>assetsfront/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assetsfront/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assetsfront/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assetsfront/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assetsfront/lib/modal-video/css/modal-video.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Main Stylesheet File -->
  <link href="<?=base_url()?>assetsfront/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eStartup
    Theme URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <header id="header" class="header header-hide">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto"><span>Jolly</span>Good</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
           <li class="<?php if($link=='beranda'){echo "menu-active";}?>"><a href="<?=base_url()?>beranda">Beranda</a></li>
          <!-- <li><a href="#about-us">Tentang Kami</a></li>
          <li><a href="#features">Program Kursus</a></li> -->
          <li class="<?php if($link=='daftarsiswa'){echo "menu-active";}?>"><a href="<?=base_url()?>beranda/daftarsiswa">Pendaftaran Siswa</a></li>
          <li class="<?php if($link=='formlogin'){echo "menu-active";}?>"><a href="<?=base_url()?>beranda/formlogin">Login Siswa</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->

    </div>
  </header><!-- #header -->
