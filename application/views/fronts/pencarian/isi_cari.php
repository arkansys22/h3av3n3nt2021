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
			  if(count($hasil_pencarian) == 0)
				{
					echo "<p align='center'>Berita yang Anda cari tidak ditemukan</p>";
				}
				else
				{
				  foreach ($hasil_pencarian as $hasil)
				  {
				    $isi = character_limiter($hasil->isi_berita,150);
            $jdl = character_limiter($hasil->judul,50);
			  ?>
              <div class='hentry post clearfix'>
                             <div style='entry-thumbnail'>
                               <a href='<?php echo base_url("$hasil->judul_seo ") ?>' class='hover-effect'><img  style='width:100%;' src='<?php echo base_url()?>asset/foto_berita/<?=$hasil->gambar?>' alt='<?=$hasil->gambar?>'  /></a></a>
                             </div>
                             <div class='article-content'>
                               <h2 class='entry-title'><a title='<?php echo $hasil->judul ?>' href='<?php echo base_url("$hasil->judul_seo ") ?>'><?php echo $jdl ?></a><a href='<?php echo base_url("$hasil->judul_seo ") ?>' </a></h2>
                               <span class='entry-meta'>
                                 <a ><span class='icon-text'>&#128100;</span><?php echo $hasil->username ?></a>
                               </span>
                               <span class='entry-meta'>
                                 <a ><span class='icon-text'>&#128340;</span><?php echo $hasil->hari ?> <?php echo tgl_indo($hasil->tanggal) ?>  <?php echo $hasil->jam ?></a>
                               </span>
                               <div class='entry-summary'>
                               <p><?php echo $isi ?></p>

                             </div>
                             </div>

                           </div>
                           <?php }} ?>
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
