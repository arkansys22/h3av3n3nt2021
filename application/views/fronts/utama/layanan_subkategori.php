<div class="news">
    <div class="container">
        <div class="blog-grid">
            <div class="row engoc-row-equal">
              <?php
                  foreach ($post_child as $post_childs) {
                    $isi = character_limiter($post_childs->konten,100);
                ?>

                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 blog-item">
                    <div class="post-img"><a class="hover-images"><img src="<?php echo base_url()?>asset/foto_private/<?=$post_childs->gambar?>" alt="" class="img-responsive"></a></div>
                    <div class="post-info v2">
                        <h3 class="post-title v3"><a href="<?php echo base_url("detail/$post_childs->judul_seo")?>"><?php echo $post_childs->judul?></a></h3>

                    </div>
                </div>
              <?php } ?>

            </div>
        </div>
        <div class="blog-bottom productfull-bottom">
            <div class="pagination-left"><a href="#" class="backto vow-top"><i class="ion-ios-arrow-up"></i></a><span>Back to top</span></div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
