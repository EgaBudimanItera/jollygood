<section id="blog" class="padd-section wow fadeInUp">
	<div class="overlay padd-section">
      <div class="container">
      <div class="section-title text-center">
        <h2><strong>Login Siswa</strong></h2>
        <p class="separator"></p>
      </div>
    </div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-12 ">
	        	<form action="<?=base_url()?>beranda/proseslogin" method="post" role="form" class="form-horizontal">
	        		<div class="row">
	        			<div class="col-md-3">
                    		<label for="exampleInputEmail1" class="pull-left">Nama User Siswa</label>
                    	</div>
                    	<div class="col-md-6">
                    		<input type="text" class="form-control" value="" required="" name="username" placeholder="Nama User Siswa">	
                    	</div>	
	        		</div> 
	        		<br>
	        		<div class="row">
	        			<div class="col-md-3">
                    		<label for="exampleInputEmail1" class="pull-left">Password</label>
                    	</div>
                    	<div class="col-md-6">
                    		<input type="password" class="form-control" value="" required="" name="password" placeholder="Password">
                        
                    	</div>	
	        		</div>
	        		<br>
	        		<div class="row">
	        			<div class="text-center"><button type="submit" class="btn btn-success">Login</button></div>
	        		</div>
	        	</form>
	        </div>
        </div>
      </div>
    </div>

</section>