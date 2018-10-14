<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Tagihan
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Tagihan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            
            <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a data-toggle="tab" href="#individu">Per Siswa</a>
                </li>
                <li>
                  <a data-toggle="tab" href="#kelas">Per Kelas</a>
                </li>
               
              </ul>

              <div class="tab-content">
                <div id="individu" class="tab-pane fade in active">
                  <br>
                   <form action="<?=base_url()?>tagihan/prosessimpanindividu" method="post">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Siswa</label>
                        <select class="form-control" name="kodesiswa" id="kodesiswa" onchange="ambilpendaftaran()" required>
                          <option value="">--Pilih Siswa--</option>
                          <?php if(!empty($siswa)){foreach($siswa as $sw){?>
                          <option value="<?=$sw->kodesiswa?>"><?=$sw->namasiswa." (".$sw->kodesiswa.")"?></option>
                          <?php }}?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nama Kelas</label>
                        <select class="form-control" name="kodependaftaran" onchange="ambilbiaya()" id="kodependaftaran" required>
                          <option value="">--Pilih Kelas--</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Tagihan</label>
                        <input type="text" class="form-control" readonly="" id="jumlah" name="jumlah">
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="tgltagih" required="" name="tgltagih">
                        </div>
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
                      <input type="submit" value="Simpan" class="btn btn-primary" /> 
                    </div>
                   </form>
                </div>
                <div id="kelas" class="tab-pane fade in">
                  <br>
                   <form action="<?=base_url()?>tagihan/prosessimpankelas" method="post">
                    <div class="col-md-6">
                      
                      <div class="form-group">
                        <label>Nama Kelas</label>
                        <select class="form-control" name="kodekelas2" onchange="ambilbiaya2()" id="kodekelas2" required>
                          <option value="">--Pilih Kelas--</option>
                          <?php
                            foreach($kelas as $k){
                          ?>
                          <option value="<?=$k->kodekelas?>"><?=$k->namakelas?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Tagihan</label>
                        <input type="text" class="form-control" readonly="" id="jumlah2" name="jumlah2">
                      </div>
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="tgltagih2" required="" name="tgltagih2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Bulan Tagihan</label>
                        <select class="form-control" name="bulan2" required>
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
                        <select class="form-control" name="tahun2"  required>
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
                      <input type="submit" value="Simpan" class="btn btn-primary" /> 
                    </div>
                   </form>
                </div>
                
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper