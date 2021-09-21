<div class="col-sm-8 col-p  main-content">
    <div class="theiaStickySidebar">
        <div class="post_details_inner">
            <div class="post_details_block">
                <figure class="social-icon">
                    <img <?php
            if(empty($berita->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='400' height='200'>";}
            else { echo " <img src='".base_url()."asset/foto_berita/".$berita->gambar."'width='700' > ";}
            ?>

                </figure>
                <h2><?php echo $berita->judul ?></h2>
                <ul class="authar-info">
                    <li><a href="#" class="link"><?php echo $berita->username ?></a></li>
                    <li><?php echo $berita->hari ?> <?php echo tgl_indo($berita->tanggal) ?>  <?php echo $berita->jam ?></li>
                    <li><a href="#" class="link"><?php echo $berita->views ?> views</a></li>
                </ul>
                <p><?php echo $berita->isi_berita ?></p>

            </div>
            <!-- Post footer -->
            <div class="post-footer">
                <div class="row thm-margin">
                    <div class="col-xs-12 col-sm-12 col-md-12 thm-padding">

                          <ul class="post-tags">
                  <span>Tags:</span>
                  <?php
                $tags = (explode(",",$berita->tag));
                $hitung = count($tags);
                for ($x=0; $x<=$hitung-1; $x++) {
                  if ($tags[$x] != ''){
                    echo "<a href='".base_url()."berita/tag/$tags[$x]'>$tags[$x]</a>";
                  }
                }
              ?>
            </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- START RELATED ARTICLES -->
                              <div class="post-inner post-inner-2">
                                  <!--post header-->
                                  <div class="post-head">
                                      <h2 class="title"><strong>Related </strong> Articles</h2>
                                  </div>
                                  <!-- post body -->
                                  <div class="post-body">
                                      <div id="post-slider-2" class="owl-carousel owl-theme">
                                          <!-- item one -->
                                          <div class="item">
                                              <div class="news-grid-2">
                                                  <div class="row row-margin">
                                                    <?php
                            foreach ($post_terbaru as $post_new)
                            {
                            $isi = character_limiter($post_new->konten,200);
                            $jdl = character_limiter($post_new->judul,40);
                            ?>
                                  <div class="col-xs-6 col-sm-4 col-md-4 col-padding">
                                      <div class="grid-item">
                                          <div class="grid-item-img">
                                              <a href="<?php echo base_url("$post_new->judul_seo ") ?>">
                                                  <img <?php
                                  if(empty($post_new->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                                  else { echo " <img src='".base_url()."asset/foto_berita/".$post_new->gambar."'width='218' height='150'> ";}
                                  ?>
                                              </a>
                                          </div>
                                          <h5><a href="<?php echo base_url("$post_new->judul_seo ") ?>" class="title"><?php echo $jdl ?></a></h5>
                                          <ul class="authar-info">
                                            <li class="authar"><a >by <?php echo $post_new->username ?></a></li>
                                            <li><i class="ti-timer"></i> <?php echo $post_new->hari ?> <?php echo tgl_indo($post_new->tanggal) ?>  <?php echo $post_new->jam ?></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <?php } ?>

                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
            <!-- Post footer -->
            <div class="post-footer">
                <div class="row thm-margin">
                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                        <a href="<?php echo base_url("berita/news") ?>" class="more-btn">More News Update</a>
                    </div>

                </div>
            </div>
        </div>
