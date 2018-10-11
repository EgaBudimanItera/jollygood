<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">List Siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <div class="widget-body">
                <a href="<?=base_url()?>siswa/formtambah" class="btn btn-danger">Tambah Data Siswa</a>
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
                      <th>Status Pendaftaran</th>
                      <th>Status Keaktifan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach($list as $l){
                        if($l->statusdaftar=='0'){
                          $statusdaftar="Calon Siswa";
                        }else{
                          $statusdaftar="Siswa";
                        }
                        if($l->statusaktif=='0'){
                          $statusaktif="Non Aktif";
                        }else{
                          $statusaktif="Aktif";
                        }
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$l->kodesiswa?></td>
                      <td><?=$l->namasiswa?></td>
                      <td><?=$statusdaftar?></td>
                      <td><?=$statusaktif?></td>
                      <td>
                        <a data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-warning" href="<?=base_url()?>siswa/formubah/<?=$l->kodesiswa?>"><i class="fa fa-pencil"></i></a>
                       <!-- <?php
                        if($l->statusdaftar=='0'){
                       ?>
                       <a data-toggle="tooltip" data-placement="bottom" title="Verifikasi Pendaftaran" class="btn btn-success" href="#" onclick="return confirm('yakin akan memverifikasi data ini?')"><i class="fa fa-houzz"></i></a>
                       <?php
                         }
                       ?> -->
                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger" href="<?=base_url()?>siswa/proseshapus  /<?=$l->kodesiswa?>" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-trash"></i></a>
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