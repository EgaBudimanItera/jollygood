<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pembayaran
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">List Pembayaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

           <!--  <div class="box-body">
              <div class="widget-body">
                <a href="<?=base_url()?>pendaftaran/formtambah" class="btn btn-danger">Tambah Data Pendaftaran</a>
              </div>  
            </div> -->
            <div class="box-body">
             <div id="info-alert"><?=@$this->session->flashdata('msg')?></div> 
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Bayar</th>
                      <th>Tanggal Tagih</th>
                      <th>Nama Siswa</th>
                      <th>Nama Kelas</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Tanggal Bayar</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach($pembayaran as $l){
                        if($l->status=='0'){
                          $a="Belum Bayar";
                        }else{
                          $a="Lunas";
                        }
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$l->kodebayar?></td>
                      <td><?=$l->tgltagih?></td>
                      <td><?=$l->namasiswa?></td>
                      <td><?=$l->namakelas?></td>
                      <td><?=$l->bulan?></td>
                      <td><?=$l->tahun?></td>
                      <td><?=$l->tglbayar?></td>
                      <td><?=$l->jumlah?></td>
                      <td><?=$a?></td>
                      <td>
                        <?php 
                          if($l->file!=NULL){
                        ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="Download BuktiBayar" class="btn btn-primary btn-xs" href="<?=base_url()?>pembayaran/download/<?=$l->file?>"><i class="fa fa-download"></i></a>
                        <?php
                          }
                          if($l->status!=0){
                        ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="Print Nota" target="_blank"class="btn btn-warning btn-xs" href="<?=base_url()?>pembayaran/nota/<?=$l->kodebayar?>"><i class="fa fa-print"></i></a>
                        <?php
                          }
                        ?>
                        <?php 
                          if($l->status=='0'){
                        ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="Verifikasi Bayar" class="btn btn-success btn-xs" href="<?=base_url()?>pembayaran/prosesverifikasi/<?=$l->kodebayar?>/<?=$l->kodesiswa?>/<?=$l->jumlah?>" onclick="return confirm('yakin akan memverifikasi data ini?')"><i class="fa fa-check-square"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger btn-xs" href="<?=base_url()?>pembayaran/proseshapus/<?=$l->kodebayar?>" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
                        <?php
                          }
                        ?>
                        
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper