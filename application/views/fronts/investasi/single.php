<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('fronts/vendor/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/utama/loading')?>
    <?php $this->load->view('fronts/utama/header')?>
    <div class="inner-banner">
  		<img class="center-image" src="<?php echo base_url()?>asset/frontend/aspanel/img/bghead.jpg" alt="">
  	</div>
    <div class="detail-wrapper">
      <div class="container">
            <div class="row padd-90">
              <div class="col-xs-12 col-md-8">
                <div class="detail-header style-2">
                  <h2 class="detail-title color-dark-2"><?php echo $post_news->nama?></h2>
                </div>
                <div class="detail-content">
                  <div class="detail-content-block">
                <div class="embed-responsive embed-responsive-16by9">
                  <img class="img-responsive img-full" <?php if(empty($post_news->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                       else { echo " <img src='".base_url()."asset/foto_investasi/".$post_news->gambar."'width='350' height='330'> ";}
                       ?></div>
              </div>
            </div>
            <div class="detail-content-block">
              <h3><?php echo $post_news->judul?></h3>
              <p><?php echo $post_news->konten?></p>

            </div>
            <div class="share clearfix">
              <div class="share-title color-dark-2">Bagikan:</div>
              <ul>
                <li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("$post_news->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $post_news->judul_seo ?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                <li class="color-ig"><a href="whatsapp://send?text=<?php echo $post_news->judul ?> - Mantenbaru.com | <?php echo base_url("$post_news->judul_seo ") ?>"><i class="fa fa-whatsapp"></i>Whatsapp</a></li>
              </ul>
            </div>
              </div>
              <div class="col-xs-12 col-md-4">
                <div class="right-sidebar">
                  <div class="help-contact bg-grey-2">
                    <h4 class="color-dark-2">KONSULTASI</h4>
                    <a class="help-phone color-dark-2 link-dr-blue" href="tel:081210126196"><img src="<?php echo base_url()?>asset/frontend/aspanel/img/detail/phone24-dark.png" alt="">0812-1012-6196</a>
                    <a class="help-mail color-dark-2 link-dr-blue" href="mailto:marketing@mantenbaru.com’s_travel@world.com"><img src="<?php echo base_url()?>asset/frontend/aspanel/img/detail/letter-dark.png" alt="">marketing@mantenbaru.com</a>
                  </div>
                  <br>
              <div class="sidebar-block type-2">
                <h4 class="sidebar-title color-dark-2">Telusuri Lebih Banyak</h4>
                <ul class="sidebar-category color-5">
                  <li>
                    <?php $jmlav = $this->model_app->view('vendor_tbl')->num_rows(); ?>
                    <a href="<?php echo base_url()?>vendor">Vendor Pernikahan<span class="fr">(<?php echo $jmlav; ?>)</span></a>
                  </li>
                  <li>
                    <?php $jmlau = $this->model_app->view('undangan_tbl')->num_rows(); ?>
                    <a href="<?php echo base_url()?>undangan">Undangan Pernikahan<span class="fr">(<?php echo $jmlau; ?>)</span></a>
                  </li>
                  <li>
                    <?php $jmlai = $this->model_app->view('investasi_tbl')->num_rows(); ?>
                    <a href="<?php echo base_url()?>investasi">Investasi<span class="fr">(<?php echo $jmlai; ?>)</span></a>
                  </li>
                  <li>
                      <?php $jmlaa = $this->model_app->view('blogs_tbl')->num_rows(); ?>
                    <a href="<?php echo base_url()?>artikel">Artikel<span class="fr">(<?php echo $jmlaa; ?>)</span></a>
                  </li>
                </ul>
              </div>

              <div class="sidebar-block type-2">
                <h4 class="sidebar-title color-dark-2">Undangan Pernikahan</h4>
                <div class="widget-slider arrows">
                  <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="100" data-center="0" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                      <?php
                          $no = 1;
                            foreach ($post_newz as $post_new) {
                                      $isi = character_limiter($post_new->meta_desc,80);
                                      $jdl = character_limiter($post_new->judul,240);
                      ?>
                      <div class="swiper-slide radius-4 active" data-val="0">
                        <img class="center-image" <?php if(empty($post_new->gambar)) {echo "<img src='".base_url()."asset/layout_foto_promo.png'>";}
                                                else { echo " <img src='".base_url()."asset/foto_undangan/".$post_new->gambar."'> ";}
                                                ?><div class="vertical-bottom">

                        </div>
                      </div>
                      <?php } ?>
                    </div>
                    <div class="pagination pagination-hidden poin-style-1"></div>
                      <div class="arr-t-3">
                      <div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span></div>
                      <div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span></div>
                    </div>
                  </div>
                </div>
              </div>

                </div>
              </div>
            </div>
      </div>
    </div>




  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
