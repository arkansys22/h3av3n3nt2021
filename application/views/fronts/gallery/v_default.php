<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/utama/header')?>

    <div class="main-wraper padd-70-0">
      <div class="container ">
        <br>
            <div class="col-md-12 ">
                <h2><center>Gallery</center></h2>
            </div>
      </div>
      <br>
        <div class="filter style-2">
            <ul class="filter-nav">
                <li class="selected" ><a href="#foto" data-filter=".foto">Foto</a></li>
                <li><a href="#videos" data-filter=".videos">Video</a></li>
            </ul>
        </div>
    	<div class="filter-content row popup-gallery">
    		<div class="grid-sizer col-mob-12 col-xs-6 col-sm-4 no-padding"></div>
                <?php
                    foreach ($post_video as $post_video) {
                ?>
                <div class="item videos gal-item style-2 col-mob-12 col-xs-6 col-sm-4 no-padding">
                  <iframe width="100%" height="235" src="<?php echo $post_video->youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                </div>
                 <?php } ?>
                 <?php
                    foreach ($post_galeri as $post_galeri) {
                ?>
                <div class="item foto gal-item style-2 col-mob-12 col-xs-6 col-sm-4 no-padding">
                  <a class="black-hover" href="<?php echo base_url()?>asset/foto_galeri/<?php echo $post_galeri->gambar ?>">
                      <?php if(empty($post_galeri->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                else { echo " <img class='img-full img-responsive' src='".base_url()."asset/foto_galeri/".$post_galeri->gambar."'> ";}
                                                ?>
                    
                    <div class="tour-layer delay-1"></div>
                    <div class="vertical-align">
                      <h3 class="color-white"><b><?php echo $post_galeri->judul ?></b></h3>
                      <h5 class="color-white"><?php echo $post_galeri->nama ?></h5>
                    </div>
                  </a>
                </div>
                <?php } ?>
    	</div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
