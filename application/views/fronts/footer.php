<footer>
  <div class="container">
    <div class="footer-widgets-part">
      <div class="row">
        <div class="col-md-4">
          <div class="widget text-widget">
            <h1>About</h1>
            <p>Manadoreview.com adalah portal berita mengusung semangat jurnalisme kebaikan dan perbaikan dengan berpijak pada kepentingan khalayak. Manadoreview diasuh para jurnalis bersertifikasi Uji Kompetensi Wartawan (UKW) dari Dewan Pers.</p>
            <p>Alamat Email : redaksi@ambonreview.com </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget posts-widget">
            <h1>Berita Terbaik Sepekan</h1>
            <ul class="list-posts">
              <?php foreach ($post_pilihan as $post_new){
                $isi = character_limiter($post_new->isi_berita,200);
                $jdl = character_limiter($post_new->judul,540);
                ?>
                <li>
                <img <?php
                if(empty($post_new->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
                else { echo " <img src='".base_url()."asset/foto_berita/".$post_new->gambar."'width='70' height='70'> ";}
                ?>
                <div class="post-content">
                  <a href="<?php echo base_url("$post_new->nama_kategori ") ?>"><?php echo $post_new->nama_kategori ?></a>
                  <h2><a href="<?php echo base_url("$post_new->judul_seo ") ?>"><?php echo $jdl ?></a></h2>
                  <ul class="post-tags">
                    <li><?php echo $post_new->hari ?>, <?php echo tgl_indo($post_new->tanggal) ?> </li>
                    <li><i class="fa fa-eye"></i><?php echo $post_new->views ?></li>
                  </ul>
                </div>
              </li>

            <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-4">

          <div class="widget tags-widget">
            <h1>Popular Tags</h1>
            <ul class="tag-list">
              <?php foreach ($get_all_tag_sidebar as $tag_sidebar) {
                 ?>
              <li><?php echo anchor('berita/tag/'.$tag_sidebar->tag_seo.'',''.$tag_sidebar->nama_tag.'') ?></li>

               <?php } ?>
            </ul>
          </div>

        </div>

      </div>
    </div>
    <div class="footer-last-line">
      <div class="row">
        <div class="col-md-6">
          <p>&copy; COPYRIGHT 2018 Aspanel</p>
        </div>
        <div class="col-md-6">
          <nav class="footer-nav">
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Redaksi</a></li>
              <li><a href="#">Pedoman Media Siber</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</footer>
