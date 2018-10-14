<section id="blog" class="padd-section wow fadeInUp">
	<div class="overlay padd-section">
      <div class="container">
      <div class="section-title text-center">
        <h2><strong>Pendaftaran Siswa Baru</strong></h2>
        <p class="separator"></p>
      </div>
    </div>
      <div class="container">
        <div class="row justify-content-center">
        	<!-- <div class="col-lg-3 col-md-4">
        		<div class="info">
        			<div>
		             Nama Siswa
		            </div>

        		</div>
        	</div>	 -->
        	<div class="col-md-12 ">
	        	<form action="<?=base_url()?>beranda/prosessimpansiswa" method="post" role="form" class="form-horizontal">
	        		<div class="row">	
                    	<div class="col-md-3">
                    		<label for="exampleInputEmail1" class="pull-left">Nama Siswa</label>
                    	</div>
                    	<div class="col-md-6">
                    		<input type="text" class="form-control" required="" name="namasiswa" placeholder="Nama Siswa">	
                    	</div>
	        		</div>
	        		<br>
	        		<div class="row">
	        			<div class="col-md-3">
                    		<label for="exampleInputEmail1" class="pull-left">Nama User Siswa</label>
                    	</div>
                    	<div class="col-md-6">
                    		<input type="text" class="form-control" required="" name="username" placeholder="Nama User Siswa">	
                    	</div>	
	        		</div> 
	        		<br>
	        		<div class="row">
	        			<div class="col-md-3">
                    		<label for="exampleInputEmail1" class="pull-left">Tanggal Lahir</label>
                    	</div>
                    	<div class="col-md-6">
                    		<div class="input-group date">
                      			<input type="text" class="form-control" placeholder="mm/dd/YYYY" id="tgllahir" name="tgllahir">
                    		</div>	
                    	</div>	
	        		</div>
	        		<br>
	        		<div class="row">
	        			<div class="text-center"><button type="submit" class="btn btn-success">Daftar</button></div>
	        		</div>
	        	</form>
	        	<!-- <div class="form">
		        	<form action="" method="post" role="form" class="contactForm">
		        		
		        		
		                	<div class="col-md-4">a</div>
		                	<div class="col-md-8"><input type="text" name="name" class="form-control"  placeholder="Nama Siswa" required=""  /></div><
		                	<div class="validation"></div>
		              	
		              	<div class="form-group">
		                	<input type="text" name="name" class="form-control"  placeholder="Nama Siswa" required=""  />
		                	<div class="validation"></div>
		              	</div>
		              	<div class="text-center">
		              		<button type="submit" class="btn btn-primary">Send Message</button>
		              	</div>
		        	</form>
		        </div>
 -->
	        </div>
        </div>
      </div>
    </div>

</section>