<div class="container">
    <div class="essential">
        
        <div class="content">
            <h3 class="title">WELCOME TO <?=$identitas->nama_website ?></h3>
            <p class="desc"><?=$identitas->deskripsi ?></p>
        </div>
    </div>
</div>
<div class="featured-product v2">
    <div class="container">
        
        <div class="row">
          <?php foreach ($post_testimoni as $post) {	 ?>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-item">

                <div class="product-img">
                    <a class="hover-images" href="#"><img src="<?php echo base_url()?>asset/foto_partners/<?=$post->gambar ?>" alt="" class="img-reponsive"></a>
                    <div class="overlay-img v2 box-content-center hover-action">
                        <div class="product-action v3">
                            <a data-fancybox href="https://www.youtube.com/watch?v=<?=$post->youtube ?>" class="hover-images image-video" ><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="product-info v2">
                    <center><h3 class="product-title"><?=$post->judul ?></h3></center>
                </div>
            </div>
            <?php  }  ?>
        </div>
    </div>


</div>

<div class="related-post">
                <h3 class="text-center">Event</h3>
                <div class="container">
                    <div class="owl-carousel owl-theme js-owl-blog">
                        
                        <?php foreach ($post_galeri as $post) {	 ?>
                        
                        <div class="blog-item">
                            <div class="post-img"><a class="hover-images"><img src="<?php echo base_url()?>asset/foto_galeri/<?=$post->gambar ?>" alt="" class="img-responsive"></a></div>
                            
                        </div>

                          <?php  }  ?>
                       
                    </div>
                </div>
            </div>
            
<div class="related-post">
                <h3 class="text-center">Artis Indonesia</h3>
                <div class="container">
                    <div class="owl-carousel owl-theme js-owl-blog">
                        
                        <?php foreach ($post_promo as $post) {	 ?>
                        
                        <div class="blog-item">
                            <div class="post-img"><a class="hover-images"><img src="<?php echo base_url()?>asset/foto_promo/<?=$post->gambar ?>" alt="" class="img-responsive"></a></div>
                            
                        </div>

                          <?php  }  ?>
                       
                    </div>
                </div>
            </div>            
