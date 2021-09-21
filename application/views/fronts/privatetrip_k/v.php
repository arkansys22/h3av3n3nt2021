<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">

    <?php $this->load->view('fronts/utama/header')?>
    <div class="main-wraper padd-70-70">
    	 <div class="container">
    		   <div class="gallery-detail">
             
             <img class="img-responsive" <?php if(empty($post_news->gambar2)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png'";}
                         			        else { echo " <img src='".base_url()."asset/foto_privatetrip/".$post_news->gambar2."'> ";}
                         			        ?>
    		    <div class="top-baner acc-body bg-grey-2">
              <br><p align="justify"><?php echo $post_news->desc_kat?>
              </p><br>
            </div>
            <?php
                    foreach ($post_child as $post_childs) {
                              
              ?>
            
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
       				<div class="radius-mask tour-block hover-aqua">
                 <a href="<?php echo base_url("paket/$post_childs->judul_seo")?>">
       				  <div class="clip">
   						 <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo base_url()?>asset/foto_private/<?=$post_childs->gambar?>)">
   						 </div>
   					  </div>
   					  <div class="tour-caption">
   					  	 <div class="vertical-align">
   					  	 	<h2 class="hover-it"><?php echo $post_childs->nama?></h2>
   					  	 </div>
   					  	 <div class="vertical-bottom">
   					  	   <div class="fl">
     					  	 	<div class="tour-info">
     					  	 		  <h4 class="font-style-2 color-white"><strong class="color-white">Super promo</strong>
                            <p>(Start Jakarta)</p>
                          </h4>
     					  	 	</div>
   					  	   </div>
   					  	 </div>
   					  </div>
               	 	</a>
       				</div>
       			</div>
       			<?php } ?>
       			
    			</div>
    		 </div>
    		</div>
    	</div>
    </div>
  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
