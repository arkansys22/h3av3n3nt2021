<div class="col-sm-8 col-p  main-content">
    <div class="theiaStickySidebar">
        <div class="post-inner">
            <!--post header-->
            <div class="post-head">
                <h2 class="title"><strong>News</strong> update</h2>
            </div>
            <!-- post body -->
            <div class="post-body">
              <?php
          foreach ($post_terbaru as $post_new)
          {
          $isi = character_limiter($post_new->isi_berita,200);
          $jdl = character_limiter($post_new->judul,40);
          ?>
              <div class='hentry post clearfix'>
                             <div style='entry-thumbnail'>
                               <a href='<?php echo base_url("$post_new->judul_seo ") ?>' class='hover-effect'><img  style='width:100%;' src='<?php echo base_url()?>asset/foto_berita/<?=$post_new->gambar?>' alt='<?=$post_new->gambar?>'  /></a></a>
                             </div>
                             <div class='article-content'>
                               <h2 class='entry-title'><a title='<?php echo $post_new->judul ?>' href='<?php echo base_url("$post_new->judul_seo ") ?>'><?php echo $jdl ?></a><a href='<?php echo base_url("$post_new->judul_seo ") ?>' </a></h2>
                               <span class='entry-meta'>
                                 <a ><span class='icon-text'>&#128100;</span><?php echo $post_new->username ?></a>
                               </span>
                               <span class='entry-meta'>
                                 <a ><span class='icon-text'>&#128340;</span><?php echo $post_new->hari ?> <?php echo tgl_indo($post_new->tanggal) ?>  <?php echo $post_new->jam ?></a>
                               </span>
                               <div class='entry-summary'>
                               <p><?php echo $isi ?></p>

                             </div>
                             </div>

                           </div>
                           <?php } ?>
            </div> <!-- /. post body -->
            <!-- Post footer -->
            <div class="post-footer">
                <div class="row thm-margin">
                    <div class="col-xs-12 col-sm-12 col-md-12 thm-padding">
                        <!-- pagination -->
                        <ul class="pagination">
                          <li ><?php echo $this->pagination->create_links() ?></li>
                        </ul> <!-- /.pagination -->
                    </div>
                </div>
            </div> <!-- /.Post footer-->
        </div>
    </div>
</div>
