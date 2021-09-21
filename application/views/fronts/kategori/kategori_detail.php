
<div class="widget post-widget">
  <div class="title-section">
    <h1><span>News Feed</span></h1>
  </div>
</div>

  <div class="col-md-8">
    <?php
    foreach ($post_terbaru2 as $post_new)
    {
    $isi = character_limiter($post_new->isi_berita,200);
    $jdl = character_limiter($post_new->judul,80);
    ?>
  <ul class="list-posts">
    <li>
      <img <?php
if(empty($post_new->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='50' height='50'>";}
else { echo " <img src='".base_url()."asset/foto_berita/".$post_new->gambar."'width='170' height='170'> ";}
?>
      <div class="post-content">
        <h2><a href="<?php echo base_url("$post_new->judul_seo ") ?>" class="title"   padding-left="1px"><?php echo $jdl ?></a></h2>
        <ul class="post-tags">
          <li></i><?php echo $post_new->hari ?>, <?php echo tgl_indo($post_new->tanggal) ?> <?php echo $post_new->jam ?></li>
        </ul>
        <?php echo $isi ?>


      </div>
    </li>
    </ul>
    <?php } ?>

</div>
