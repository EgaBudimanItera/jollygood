<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Password User Aplikasi
      </h1>
      <?php $this->load->view('template/breadcrumb')?>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-xs-6">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">User Aplikasi</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" >
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            
            <div id="info-alert"><?=@$this->session->flashdata('msg')?></div>
            <!-- /.box-header -->
            <form action="<?=base_url()?>buatsiswa/ubahpassword" role="form" method="post" class="form-horizontal">
              <div class="box-body">
               <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama User Aplikasi</label>
                  <input type="text" class="form-control" readonly="" value="<?=$this->session->userdata('username')?>"  name="username" placeholder="Nama User Aplikasi">
                  <input type="hidden" class="form-control" readonly="" value="<?=$this->session->userdata('kodesiswa')?>"  name="kodesiswa" placeholder="Nama User Aplikasi">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="Password" value="" class="form-control" required name="password" placeholder="Masukkan Password Baru">
                </div>
                
               </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  
                  <button type="submit" class="btn btn-success">Simpan</button>
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