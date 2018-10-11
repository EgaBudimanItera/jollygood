<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data Siswa
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Siswa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            
            <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
            <!-- /.box-header -->
            <form action="<?=base_url()?>siswa/prosesubahadmin" role="form" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Siswa</label>
                    <input type="text" class="form-control" readonly value="<?=$list->kodesiswa?>" name="kodesiswa" placeholder="Kode Siswa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Siswa</label>
                    <input type="text" class="form-control" required="" value="<?=$list->namasiswa?>" name="namasiswa" placeholder="Nama Siswa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" required="" name="jk" style="width: 100%;">
                      <option value="">--Pilih Jenis Kelamin--</option> 
                      <option value="0" <?=$list->jk == '0' ? ' selected="selected"' : '';?>>Laki-Laki</option>
                      <option value="1" <?=$list->jk == '1' ? ' selected="selected"' : '';?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" class="form-control" required="" value="<?=$list->tmplahir?>" name="tmplahir" placeholder="Tempat Lahir">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control" value="<?php echo date_format(date_create($list->tgllahir),'m/d/Y')?>" id="tgllahir" name="tgllahir">
                    </div>
                  </div>  
                  
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="text" class="form-control" required="" value="<?=$list->nohp?>" name="nohp" placeholder="No Hp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control"><?=$list->alamat?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama User Siswa</label>
                    <input type="text" class="form-control" readonly="" value="<?=$list->username?>" name="username" placeholder="No Hp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Pendaftaran</label>
                    <select class="form-control" required="" name="jk" style="width: 100%;">
                      <option value="">--Pilih Jenis Kelamin--</option> 
                      <option value="0" <?=$list->statusdaftar == '0' ? ' selected="selected"' : '';?>>Calon Siswa</option>
                      <option value="1" <?=$list->statusdaftar == '1' ? ' selected="selected"' : '';?>>Siswa</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Keaktifan</label>
                    <select class="form-control" required="" name="jk" style="width: 100%;">
                      <option value="">--Pilih Jenis Kelamin--</option> 
                      <option value="0" <?=$list->statusaktif == '0' ? ' selected="selected"' : '';?>>Non Aktif</option>
                      <option value="1" <?=$list->statusaktif == '1' ? ' selected="selected"' : '';?>>Aktif</option>
                    </select>
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