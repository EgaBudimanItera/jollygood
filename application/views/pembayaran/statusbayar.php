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

            <div class="box-body">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="100px">Nama Siswa</td>
                  <td width="10px">:</td>
                  <td width="400px"><?=$listatas->namasiswa?></td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                  <td>&nbsp</td>
                </tr>
                <tr>
                  <td >Nama Kelas</td>
                  <td>:</td>
                  <td ><?=$listatas->namakelas?>(<?=date_format(date_create($listatas->tglbuka),'d M Y')?> S/D <?=date_format(date_create($listatas->tgltutup),'d M Y')?>)</td>
                </tr>
              </table>
            </div>
            <div class="box-body">
             <div id="info-alert"><?=@$this->session->flashdata('msg')?></div> 
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Tagihan</th>
                      <th>Tanggal Bayar</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Jumlah</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      foreach($list as $l){
                        if($l->status=='0'){
                          $a='Belum Bayar';
                        }else{
                          $a='Sudah Bayar';
                        }
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$l->tgltagih?></td>
                      <td><?=$l->tglbayar?></td>
                      <td><?=$l->bulan?></td>
                      <td><?=$l->tahun?></td>
                      <td><?=$l->jumlah?></td>
                      <td><?=$a?></td>
                      <td>
                        <?php
                          if($l->status=='0'){
                        ?>
                        <a data-toggle="tooltip" data-placement="bottom" title="Bayar" class="btn btn-warning" href="#" ><i class="fa fa-gear"></i></a>
                        <a data-toggle="tooltip" data-placement="bottom" title="Hapus" class="btn btn-danger" href="#" ><i class="fa fa-trash"></i></a>
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