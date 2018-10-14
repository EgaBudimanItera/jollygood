<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tagihan
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">List Tagihan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="widget-body">
                <a href="<?=base_url()?>tagihan/formtambah" class="btn btn-danger">Tambah Data Tagihan</a>
              </div>  
            </div>
            <div class="box-body">
             <div id="info-alert"><?=@$this->session->flashdata('msg')?></div> 
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Kode Kelas</th>
                      <th>Nama Kelas</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Jumlah Tagihan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach($list as $l){
                    ?>
                    <tr>
                      <td align="center"><?=$no++;?></td>
                      <td align="center"><?=$l->kodesiswa?></td>
                      <td><?=$l->namasiswa?></td>
                      <td align="center"><?=$l->kodekelas?></td>
                      <td><?=$l->namakelas?></td>
                      <td align="center"><?=$l->bulan?></td>
                      <td align="center"><?=$l->tahun?></td>
                      <td align="right"><?=number_format($l->biayabulanan,0,',','.')?></td>
                      <td>
                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger" href="<?=base_url()?>tagihan/proseshapus/<?=$l->kodebayar?>" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
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