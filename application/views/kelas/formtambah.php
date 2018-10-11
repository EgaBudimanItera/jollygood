<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Kelas
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Kelas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            
            <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
            <!-- /.box-header -->
            <form action="<?=base_url()?>kelas/prosessimpan" role="form" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Kelas</label>
                    <input type="text" class="form-control" readonly value="<?=$kodekelas?>" name="kodekelas" placeholder="Kode Kelas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" class="form-control" required="" name="namakelas" placeholder="Nama kelas">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Mulai</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tglbuka" name="tglbuka">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Berakhir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tgltutup" name="tgltutup">
                    </div>
                  </div>  
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Pendaftaran</label>
                    <input type="number" class="form-control" required="" name="biayadaftar" placeholder="Biaya Pendaftaran">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Per Bulan</label>
                    <input type="number" class="form-control" required="" name="biayabulanan" placeholder="Biaya Perbulan">
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper