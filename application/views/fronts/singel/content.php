<div class="col-md-9 col-sm-8">
  <!-- block content -->
  <div class="block-content">

    <!-- single-post box -->
    <div class="single-post-box">
      <div class="title-post">
        <h1><?php echo $berita->judul ?></h1>
        <ul class="post-tags">
          <li><i class="fa fa-clock-o"></i><?php echo tgl_indo($berita->tanggal) ?></li>
          <li><i class="fa fa-user"></i>by <a href="#"><?php echo $berita->username ?></a></li>
          <li><i class="fa fa-eye"></i><?php echo $berita->views ?></li>
        </ul>
      </div>
    <div class="post-tags-box">
        <ul class="tags-box">
                <?php
              $tags = (explode(",",$berita->tag));
              $hitung = count($tags);
              for ($x=0; $x<=$hitung-1; $x++) {
                if ($tags[$x] != ''){
                  echo "<li><a href='".base_url()."vendor/tag/$tags[$x]'>$tags[$x]</a></li>";
                }
              }
            ?>

        </ul>
      </div>


      <div class="post-gallery">
        <img <?php
  if(empty($berita->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
  else { echo " <img src='".base_url()."asset/foto_vendor/".$berita->gambar."'width='100%' height='450'> ";}
  ?>
      </div>

      <div class="post-content">
        <?php echo $berita->konten ?>
      </div>



      <div class="share-post-box">
        <ul class="share-box">
          <li><H3>BAGIKAN </H3></li>
          <li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $berita->judul_seo ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url()?><?php echo $berita->judul_seo ?>','newwindow','width=400,height=350');  return false;"><i class="fab fa-facebook fa-2x"></i></a></li>
          <li><a class="twitter" href="http://twitter.com/share?url=<?php echo base_url()?><?php echo $berita->judul_seo ?>"  onclick="window.open('http://twitter.com/share?url=<?php echo base_url()?><?php echo $berita->judul_seo ?>','newwindow','width=400,height=350');  return false;"><i class="fab fa-twitter fa-2x"></i></a></li>
          <li><a class="google" href="whatsapp://send?text=<?php echo base_url()?><?php echo $berita->judul_seo ?>"><i class="fab fa-whatsapp fa-2x"></i></a></li>

        </ul>
      </div>
      <?php $this->load->view('fronts/iklan/middletopbanner_single')?>

      <!-- carousel box -->
      <br><br>
      <div class="carousel-box owl-wrapper">
        <div class="title-section">
          <h1><span>Berita Lainnya</span></h1>
        </div>
        <div class="owl-carousel" data-num="3">
          <?php foreach ($post_pilihan as $post_new){
            $isi = character_limiter($post_new->konten,200);
            $jdl = character_limiter($post_new->judul,30);
            ?>
          <div class="item news-post image-post3">
            <img <?php
      if(empty($post_new->gambar)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='350' height='230'>";}
      else { echo " <img src='".base_url()."asset/foto_berita/".$post_new->gambar."'width='100%' height='150'> ";}
      ?>
            <div class="hover-box">
              <h2><a href="<?php echo base_url("$post_new->judul_seo ") ?>"><?php echo $jdl ?></a></h2>
              <ul class="post-tags">
                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
              </ul>
            </div>
          </div>

<?php } ?>
        </div>
      </div>
      <!-- End carousel box -->

      <!-- comment area box -->
      <div class="comment-area-box">
        <div class="title-section">
          <h1><span>Komentar</span></h1>
        </div>
        <ul class="comment-tree">
          <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          <fb:comments href="<?php echo base_url("$berita->judul_seo ") ?>" num_posts="3" width="100%"></fb:comments>
        </ul>
      </div>

    </div>
    <!-- End single-post box -->

  </div>
  <!-- End block content -->

</div>

<div class="col-md-3 col-sm-4">

  <!-- sidebar -->
  <div class="sidebar large-sidebar">
    <?php $this->load->view('fronts/iklan/sidebariklan3')?>

    <div class="widget post-widget">
      <div class="title-section">
        <h1><span>Berita Populer</span></h1>
      </div>
      <ul class="list-posts">
        <?php
        foreach ($post_popular as $post_new)
        {
        $isi = character_limiter($post_new->konten,200);
        $jdl = character_limiter($post_new->judul,40);
        ?>
        <li>
          <div class="post-content">
            <h2><a href="<?php echo base_url("$post_new->judul_seo ") ?>"><?php echo $jdl ?></a></h2>
            <ul class="post-tags">
              <li><i class="fa fa-clock-o"></i><?php echo tgl_indo($post_new->tanggal) ?></li>
            </ul>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>
    <?php $this->load->view('fronts/iklan/sidebariklan2')?>

    <div class="widget social-widget">
      <div class="title-section">
        <h1><span>Like Fanpage</span></h1>
      </div>
      <?php $this->load->view('fronts/widget/facebook')?>
    </div>
    <?php $this->load->view('fronts/iklan/sidebariklan1')?>


  </div>
  <!-- End sidebar -->

</div>
