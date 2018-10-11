<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pendaftaran
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Pendaftaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            
            <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
            <!-- /.box-header -->
            <form action="<?=base_url()?>pendaftaran/prosessimpan" role="form" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pendaftaran</label>
                    <input type="text" class="form-control" readonly value="<?=$kodependaftaran?>" name="kodesiswa" placeholder="Kode Siswa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Daftar</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" id="tanggaldaftar" name="tanggal">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama siswa</label>
                    <select class="form-control" required="" id="kodesiswa" name="kodesiswa" style="width: 100%;">
                      <option value="">--Pilih Siswa--</option> 
                      <?php
                        foreach($siswa as $s){
                      ?>
                      <option value="<?=$s->kodesiswa?>"><?=$s->namasiswa?></option> 
                      <?php    
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan Tambahan</label>
                    <textarea name="keterangan" class="form-control"></textarea>  
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <select class="form-control" required="" onchange="ambildatakelas()" id="kodekelas" name="kodekelas" style="width: 100%;">
                      <option value="">--Pilih Kelas--</option> 
                      <?php
                        foreach($kelas as $s){
                      ?>
                      <option value="<?=$s->kodekelas?>"><?=$s->namakelas?></option> 
                      <?php    
                        }
                      ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Pendaftaran</label>
                    <input type="text" class="form-control" readonly="" name="biayadaftar" id="biayadaftar" placeholder="Biaya Pendaftaran">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Biaya Per Bulan</label>
                    <input type="text" class="form-control" readonly="" name="biayabulanan" id="biayabulanan"placeholder="Biaya Per Bulan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Siswa Saat Ini</label>
                    <input type="text" class="form-control" readonly="" name="jumlahsiswa" id="jumlahsiswa"placeholder="Jumlah Siswa">
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
  