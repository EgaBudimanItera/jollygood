<?php
  $userHakakses=$this->session->userdata('userHakakses');
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/admin.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('userNama')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="<?php if($link=='beranda'){echo'active';}?>">
          <a href="<?=base_url()?>berandaadmin"><i class="fa fa-home"></i> Beranda</a>
        </li>
       
        <li class="<?php if($link=='siswa' ||$link=="kelas"){echo'active';}?> treeview">
          <a href="#">
            <i class="fa fa-industry"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($link=='siswa'){echo'active';}?>"><a href="<?=base_url()?>siswa"><i class="fa fa-cubes"></i> Siswa</a></li>
            <li class="<?php if($link=='kelas'){echo'active';}?>"><a href="<?=base_url()?>kelas"><i class="fa fa-server"></i> Kelas</a></li>
           
            <?php
             if($userHakakses=="Pimpinan"){
            ?>
            <li class="<?php if($link=='admin'){echo'active';}?>"><a href="<?=base_url()?>admin"><i class="fa fa-users"></i> Admin</a></li>
            <?php
             }
            ?>
            
          </ul>
        </li>

        <li class="<?php if($link=='pendaftaran'||$link=="pembayaran"||$link=="tagihan"){echo'active';}?> treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($link=='pendaftaran'){echo'active';}?>"><a href="<?=base_url()?>pendaftaran"><i class="fa fa-gears"></i> Pendaftaran</a></li>
            <li class="<?php if($link=='tagihan'){echo'active';}?>"><a href="<?=base_url()?>tagihan"><i class="fa fa-gears"></i> Tagihan</a></li>
            <li class="<?php if($link=='pembayaran'){echo'active';}?>"><a href="<?=base_url()?>pembayaran"><i class="fa fa-gears"></i> Pembayaran</a></li>
          </ul>
        </li>

        <li class="<?php if($link=='lappendapatandaftar'||$link=='lappendapatanspp'||$link=='lapgrafik'){echo'active';}?> treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Laporan Pendapatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($link=='lappendapatandaftar'){echo'active';}?>"><a href="<?=base_url()?>laporan/pospendaftaran"><i class="fa fa-print"></i> Pos Pendaftaran</a></li>
            <li class="<?php if($link=='lappendapatanspp'){echo'active';}?>"><a href="<?=base_url()?>laporan/posspp"><i class="fa fa-print"></i> Pos Biaya Kursus Per Bulan</a></li>
             <li class="<?php if($link=='lapgrafik'){echo'active';}?>"><a href="<?=base_url()?>laporan/lapgrafik"><i class="fa fa-print"></i> Grafik Pendapatan</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>