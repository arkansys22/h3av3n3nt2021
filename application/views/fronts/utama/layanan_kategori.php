<div class="collection-full">
        <div class="slider-collectionf js-slider-collectionf">
          <?php  foreach ($post_1 as $post_new) {   ?>
            <div class="items">
              <a href="<?php echo base_url("services/$post_new->kategori_seo ")?>">
                <img src="<?php echo base_url()?>asset/foto_privatetrip/<?=$post_new->gambar?>" alt="images">
                <div class="box-content-left text">
                    <h3 class="slider-title"><?=$post_new->nama?></h3>
                    <p class="slider-desc"><?=$post_new->desc_kat?></p>
                </div>
                </a>
            </div>
          <?php } ?>

        </div>
         <div class="custom">
             <div class="post-fade">
             </div>
             <div class="pagingInfo"></div>
         </div>

</div>
