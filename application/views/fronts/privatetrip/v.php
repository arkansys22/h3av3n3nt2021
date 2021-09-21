<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">

    <?php $this->load->view('fronts/utama/header')?>
    <div class="main-wraper padd-70-70">
    	<div class="container ">
        <br>
      			<div class="col-md-12 ">
      					<h2><center>Private Trip</center></h2>
      			</div>
    	</div>
    </div>
    <div class="main-wraper padd-90">
    	<div class="container">
    		<div class="row">
    		    <?php
                    foreach ($post_news as $post_new) {
                              $isi = character_limiter($post_new->isi_berita,200);
                              $jdl = character_limiter($post_new->judul,240);
              ?>
    		    
    			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    				<div class="radius-mask tour-block hover-aqua">
              <a href="<?php echo base_url("private/$post_new->id_kategori")?>">
    				  <div class="clip">
						 <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo base_url()?>asset/foto_privatetrip/<?=$post_new->gambar?>)">
						    
						 </div>
					  </div>
					  <div class="tour-layer delay-1"></div>
					
            	 	</a>
    				</div>
    			</div>
            <?php } ?>
    		</div>
    	</div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
