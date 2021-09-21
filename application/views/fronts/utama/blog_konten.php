<div class="news-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-xs-12 col-sm-8 col-md-9">
              <?php
                 foreach ($post_news as $post_new) {
               ?>
                <div class="single-post-item">
                    <div class="blog-img">
                        <a href="<?php echo base_url("blogs/$post_new->judul_seo ")?>" class="hover-images"><img src="<?php echo base_url()?>asset/foto_blogs/<?php echo $post_new->gambar?>" alt="" class="img-reponsive"></a>
                    </div>
                    <div class="blog-info">
                        <div class="post-element v2">
                            <div class="post-date"><?php echo tgl_indo($post_new->tanggal)?></div>
                            <div class="post-date post-author">By : <?php echo $post_new->username?></div>
                            <div class="post-date post-author"><?php echo $post_new->views?> views</div>
                            <div class="post-date post-author"><i class="fa fa-share-alt"></i></div>
                        </div>
                        <h3 class="post-title v4"><a class="v-color1" href="<?php echo base_url("blogs/$post_new->judul_seo ")?>"><?php echo $post_new->judul?></a></h3>
                        <p class="post-desc"><?php echo character_limiter($post_new->konten,150)?></p>
                        <a href="<?php echo base_url("blogs/$post_new->judul_seo ")?>" class="btn-post">Read more</a>
                    </div>
                </div>
                <?php } ?>



                <div class="single-post-pagination">
                      <?php  echo $this->pagination->create_links();  ?>
                </div>
            </div>
            <div class="sidebar col-xs-12 col-sm-4 col-md-3">
                <div class="blog-social">
                    <h3 class="sidebar-heading v1">Stay in touch with us</h3>
                    <a href="<?=$identitas->facebook ?>"><i class="fa fa-facebook" ></i></a>
                    <a href="<?=$identitas->instagram ?>"><i class="fa fa-instagram" ></i></a>
                    <a href="<?=$identitas->twitter ?>"><i class="fa fa-twitter" ></i></a>
                    <a href="<?=$identitas->youtube ?>"><i class="fa fa-youtube" ></i></a>
                    <a href="<?=$identitas->whatsapp ?>"><i class="fa fa-whatsapp" ></i></a>

                </div>
                <div class="widget widget-latest-post">
                    <h3 class="sidebar-heading v2">Services</h3>
                    <?php foreach ($post_katservice as $post_new) {  ?>
                    <div class="latest-item">
                        <h3><a href="<?php echo base_url("artis/$post_new->judul_seo ")?>" class="v-color1"><?php echo $post_new->judul?></a></h3>
                        <p><?php echo tgl_indo($post_new->tanggal)?></p>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>
