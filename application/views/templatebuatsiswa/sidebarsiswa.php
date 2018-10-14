<?php
  $hakakses=$this->session->userdata('hakakses');
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
          <p><?=$this->session->userdata('username')?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="<?php if($link=='profil'){echo'active';}?>">
          <a href="<?=base_url()?>buatsiswa"><i class="fa fa-user"></i> Profil Siswa</a>
        </li>
        <li class="<?php if($link=='pembayaran'){echo'active';}?>">
          <a href="<?=base_url()?>buatsiswa/formpembayaran"><i class="fa fa-user"></i> Pembayaran Kursus</a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>