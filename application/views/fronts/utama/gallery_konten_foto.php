<div class="featured-product v2">
    <div class="container">
        <center><h3 class="vow-title">Gallery <?=$identitas->nama_website ?></h3></center>
        <div class="row">
          <?php foreach ($post_galeri as $post) {	 ?>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 product-item">

                <div class="product-img">
                   <img src="<?php echo base_url()?>asset/foto_galeri/<?=$post->gambar ?>" alt="" class="img-reponsive">
                </div>
            </div>
            <?php  }  ?>
        </div>
    </div>


</div>
