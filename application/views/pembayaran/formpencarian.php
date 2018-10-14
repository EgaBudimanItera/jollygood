<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Siswa
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
            <form action="<?=base_url()?>pembayaran/caripembayaran" role="form" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Siswa</label>
                    <select class="form-control" required="" name="kodesiswa" id="kodesiswa" style="width: 100%;">
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
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <select class="form-control" required="" name="kodekelas" id="kodekelas" style="width: 100%;">
                      <option value="">--Pilih Kelas--</option> 
                      <?php
                        foreach($kelas as $k){
                      ?>
                      <option value="<?=$k->kodekelas?>"><?=$k->namakelas.'( '.date_format(date_create($k->tglbuka),'d M Y').' S/D '.date_format(date_create($k->tgltutup),'d M Y').' )'?></option> 
                      <?php 
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Bulan Tagihan</label>
                    <select class="form-control" name="bulan" required>
                      <option value="">--Pilih Bulan--</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label>Tahun Tagihan</label>
                      <select class="form-control" name="tahun" id="tahun" required>
                        <option value="">--Pilih Tahun--</option>
                        <?php
                          $years=range(date('Y')-5,date('Y')+5);
                          foreach ($years as $y) {
                        ?>
                        <option value="<?=$y?>"><?=$y?></option>
                        <?php
                          }
                        ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <!-- <div class="col-md-5">
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="text" class="form-control" required="" name="nohp" placeholder="No Hp">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama User Siswa</label>
                    <input type="text" class="form-control" required="" name="username" placeholder="Nama User Siswa">
                  </div>
                </div>
                <div class="col-md-1"></div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right">Cari</button>
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